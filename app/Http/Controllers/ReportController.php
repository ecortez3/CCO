<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Input;
use App\Client;
use Carbon\Carbon;

class ReportController extends Controller {

    public function viewIndex()
    {
        // We need to get all clients, then get all meals for each client (two arrays)
        $time = Carbon::now();
        $clients = Client::orderBy('lname', 'asc')->get();
        $filter = 'All Records';
        $mealsTotal = $mealsDayTotal = $dayTotal = $eligibleMealsDayTotal = array();
        $dayGrandTotal = $eligibleDayGrandTotal = 0;
        $eligible=0;
        for ($i=1;$i<=31;$i++) { $dayTotal[$i] = 0; }
        foreach($clients as $client)
        {
            $id = $client->id;
            if ($client->program_id == 5) { $eligible=0;} else {$eligible=1;}
            $mealsTotal[$id]=0;
            $startdate = date('Y-m-d', strtotime($time->year . '-' . ($time->month) . '-01')) ;
            if($time->month == 12) {
                $endate = date('Y-m-d', strtotime(($time->year+1) . '-01-01'));
            } else {
                $endate = date('Y-m-d', strtotime($time->year . '-' . ($time->month + 1) . '-01'));
            }
            // First gather the "real" rows...
            $rowMeals[$id] = $client->meal()->where('date_fed', '>=', $startdate)
                                            ->where('date_fed', '<', $endate)
                                            ->get()->toArray();
            foreach ($rowMeals[$id] as $row)
            {
                $thisdate=Carbon::parse($row['date_fed']);
                $id = $row['client_id'];
                $b = $row['breakfast'];
                $l = $row['lunch'];
                $d = $row['dinner'];
                // $mealRow[$id];
                $mealRows[$id][$thisdate->day] = array($row['date_fed'], $b, $l, $d);
            }
            // Then, insert zeros into the dates with no records
            for ($i=1;$i<=31;$i++)
            {
                if (!isset($mealRows[$id][$i])) {
                    $date_fed = $time->year . "-" . $time->month . "-" . $i;
                    $mealRows[$id][$i] = array($date_fed, 0, 0, 0);
                }
                $mealsDayTotal[$id][$i] = $mealRows[$id][$i][1] + $mealRows[$id][$i][2] + $mealRows[$id][$i][3];
                $mealsTotal[$id] += ($mealRows[$id][$i][1] + $mealRows[$id][$i][2] + $mealRows[$id][$i][3]);
                $dayTotal[$i] += ($mealRows[$id][$i][1] + $mealRows[$id][$i][2] + $mealRows[$id][$i][3]) ;
                $dayGrandTotal += $mealsDayTotal[$id][$i];
                if ($eligible) {
                    $eligibleMealsDayTotal[$id][$i] = $mealRows[$id][$i][1] + $mealRows[$id][$i][2] + $mealRows[$id][$i][3];
                    $eligibleDayGrandTotal += $eligibleMealsDayTotal[$id][$i];
                }
            }
        }
         return view ('report.reporter_index', compact('clients', 'filter', 'mealRows', 'mealsTotal', 'mealsDayTotal', 'dayTotal', 'dayGrandTotal', 'eligibleDayGrandTotal', 'time'));
    }

    public function viewMealIndex($mealdigit)
    {
        // We need to get all clients, then get all meals for each client (two arrays)
        $time = Carbon::now();
        switch ($mealdigit)
        {
            case 1:
                $filter = 'Breakfast';
                break;
            case 2:
                $filter = 'Lunch';
                break;
            case 3:
                $filter = 'Dinner';
                break;
            default:
                $filter = 'Uh oh';
                break;
        }
        $clients = Client::orderBy('lname', 'asc')->get();
        $mealsTotal = $mealsDayTotal = $dayTotal = $eligibleMealsDayTotal = array();
        $dayGrandTotal = $eligibleDayGrandTotal = 0;
        $eligible=0;
        for ($i=1;$i<=31;$i++) { $dayTotal[$i] = 0; }
        foreach($clients as $client)
        {
            $id = $client->id;
            if ($client->program_id == 5) { $eligible=0;} else {$eligible=1;}
            $mealsTotal[$id]=0;
            $startdate = date('Y-m-d', strtotime($time->year . '-' . ($time->month) . '-01')) ;
            if($time->month == 12) {
                $endate = date('Y-m-d', strtotime(($time->year+1) . '-01-01'));
            } else {
                $endate = date('Y-m-d', strtotime($time->year . '-' . ($time->month + 1) . '-01'));
            }
            // First gather the "real" rows...
            $rowMeals[$id] = $client->meal()->where('date_fed', '>=', $startdate)
                ->where('date_fed', '<', $endate)
                ->get()->toArray();
            foreach ($rowMeals[$id] as $row)
            {
                $thisdate=Carbon::parse($row['date_fed']);
                $id = $row['client_id'];
                $b = $row['breakfast'];
                $l = $row['lunch'];
                $d = $row['dinner'];
                // $mealRow[$id];
                $mealRows[$id][$thisdate->day] = array($row['date_fed'], $b, $l, $d);
            }
            // Then, insert zeros into the dates with no records
            for ($i=1;$i<=31;$i++)
            {
                if (!isset($mealRows[$id][$i])) {
                    $date_fed = $time->year . "-" . $time->month . "-" . $i;
                    $mealRows[$id][$i] = array($date_fed, 0, 0, 0);
                }
                $mealsDayTotal[$id][$i] = $mealRows[$id][$i][$mealdigit] ;
                $mealsTotal[$id] += ($mealRows[$id][$i][$mealdigit]);
                $dayTotal[$i] += ($mealRows[$id][$i][$mealdigit]) ;
                $dayGrandTotal += $mealsDayTotal[$id][$i];
                if ($eligible) {
                    $eligibleMealsDayTotal[$id][$i] = $mealRows[$id][$i][$mealdigit];
                    $eligibleDayGrandTotal += $eligibleMealsDayTotal[$id][$i];
                }
            }
        }
        return view ('report.reporter_index', compact('clients', 'filter', 'mealRows', 'mealsTotal', 'mealsDayTotal', 'dayTotal', 'dayGrandTotal', 'eligibleDayGrandTotal', 'time'));
    }

    public function search()
    {

        if(Input::has('query')) {
            $query = Input::get('query');
        } else {
            $query=' ';
        }
        // We need to get all clients, then get all meals for each client (two arrays)
        $time = Carbon::now();
        $filter = 'All Records';
        $clients = Client::where('lname', 'LIKE', '%'.$query.'%')->orderBy('lname', 'asc')->get();
        $mealsTotal = $mealsDayTotal = $dayTotal = $eligibleMealsDayTotal = array();
        $dayGrandTotal = $eligibleDayGrandTotal = 0;
        $eligible=0;
        for ($i=1;$i<=31;$i++) { $dayTotal[$i] = 0; }
        foreach($clients as $client)
        {
            $id = $client->id;
            if ($client->program_id == 5) { $eligible=0;} else {$eligible=1;}
            $mealsTotal[$id]=0;
            $startdate = date('Y-m-d', strtotime($time->year . '-' . ($time->month) . '-01')) ;
            if($time->month == 12) {
                $endate = date('Y-m-d', strtotime(($time->year+1) . '-01-01'));
            } else {
                $endate = date('Y-m-d', strtotime($time->year . '-' . ($time->month + 1) . '-01'));
            }
            // First gather the "real" rows...
            $rowMeals[$id] = $client->meal()->where('date_fed', '>=', $startdate)
                ->where('date_fed', '<', $endate)
                ->get()->toArray();
            foreach ($rowMeals[$id] as $row)
            {
                $thisdate=Carbon::parse($row['date_fed']);
                $id = $row['client_id'];
                $b = $row['breakfast'];
                $l = $row['lunch'];
                $d = $row['dinner'];
                // $mealRow[$id];
                $mealRows[$id][$thisdate->day] = array($row['date_fed'], $b, $l, $d);
            }
            // Then, insert zeros into the dates with no records
            for ($i=1;$i<=31;$i++)
            {
                if (!isset($mealRows[$id][$i])) {
                    $date_fed = $time->year . "-" . $time->month . "-" . $i;
                    $mealRows[$id][$i] = array($date_fed, 0, 0, 0);
                }
                $mealsDayTotal[$id][$i] = $mealRows[$id][$i][1] + $mealRows[$id][$i][2] + $mealRows[$id][$i][3];
                $mealsTotal[$id] += ($mealRows[$id][$i][1] + $mealRows[$id][$i][2] + $mealRows[$id][$i][3]);
                $dayTotal[$i] += ($mealRows[$id][$i][1] + $mealRows[$id][$i][2] + $mealRows[$id][$i][3]) ;
                $dayGrandTotal += $mealsDayTotal[$id][$i];
                if ($eligible) {
                    $eligibleMealsDayTotal[$id][$i] = $mealRows[$id][$i][1] + $mealRows[$id][$i][2] + $mealRows[$id][$i][3];
                    $eligibleDayGrandTotal += $eligibleMealsDayTotal[$id][$i];
                }
            }
        }
        return view ('report.reporter_index', compact('clients', 'filter', 'mealRows', 'mealsTotal', 'mealsDayTotal', 'dayTotal', 'dayGrandTotal', 'eligibleDayGrandTotal', 'time'));
    }


    public function nextMonth($month)
	{
		$time=carbon::parse($month);
		$time =$time->addMonth(1);
		$clients = Client::orderBy('lname', 'asc')->get();
		return view ('report.reporter_index', compact('clients', 'time'));
	}

    /**
     * @param $month
     * @return \Illuminate\View\View
     */
    public function previousMonth($month)
	{
		$time=carbon::parse($month);
		$time=$time->subMonth(1);
		$clients = Client::orderBy('lname', 'asc')->get();
		return view ('report.reporter_index', compact('clients', 'time'));
	}

    /**
     * @param $date
     * @return \Illuminate\View\View
     */
    public function printMonth($date)
	{
		$time=carbon::parse($date);
        $stdate = date('Y-m-d', strtotime($time->year . '-' . ($time->month) . '-01')) ;
        if($time->month == 12) {
            $edate = date('Y-m-d', strtotime(($time->year+1) . '-01-01'));
        } else {
            $edate = date('Y-m-d', strtotime($time->year . '-' . ($time->month + 1) . '-01'));
        }
		$clients = Client::orderBy('lname', 'asc')->get();
        $hannah_clients = Client::hannah()->orderBy('lname', 'asc')->get();
        $sylvia_clients = Client::sylvia()->orderBy('lname', 'asc')->get();
        $naomi_clients = Client::naomim()->orderBy('lname', 'asc')->get();
        $wnaomi_clients = Client::naomiw()->orderBy('lname', 'asc')->get();
        $outreach_clients = Client::outreach()->orderBy('lname', 'asc')->get();

        $mealsTotal = $this->mealsTotal($stdate, $edate);
        return view ('report.month_view', compact('clients',
                        'mealsTotal',
                        'hannah_clients',
                        'sylvia_clients',
                        'naomi_clients',
                        'wnaomi_clients',
                        'outreach_clients',
                        'time'));
	}

	public function printQuarter($date)
	{
		$time=carbon::parse($date);
		$curMonth = $time->month;
		$cur = ceil($curMonth/3);

        $clients = Client::orderBy('lname', 'asc')->get();
        $hannah_clients = Client::hannah()->orderBy('lname', 'asc')->get();
        $sylvia_clients = Client::sylvia()->orderBy('lname', 'asc')->get();
        $naomi_clients = Client::naomim()->orderBy('lname', 'asc')->get();
        $wnaomi_clients = Client::naomiw()->orderBy('lname', 'asc')->get();
        $outreach_clients = Client::outreach()->orderBy('lname', 'asc')->get();
        $stdate = '2015-07-01';
        $edate = '2015-10-01';
        $mealsTotal = $this->mealsTotal($stdate, $edate);
		return view ('report.quarter_view', compact('clients',
                                                    'mealsTotal',
                                                    'hannah_clients',
                                                    'sylvia_clients',
                                                    'naomi_clients',
                                                    'wnaomi_clients',
                                                    'outreach_clients',
                                                    'cur'));
	}
	
	public function printAnnual($date)
	{
		$clients = Client::orderBy('lname', 'asc')->get();
		$time=carbon::parse($date);
		$year = $time->year;
		
		return view ('report.annual_view', compact('clients', 'year'));
	}
	
	public function printMonthReport($date)
	{
		$time=carbon::parse($date);
		$clients = Client::men()->orderBy('lname', 'asc')->get();
        $eligibleMen = Client::eligibleMen()->get();
        $ineligibleMen = Client::ineligibleMen()->get();
        $emTotal = $this->mealsGroupTotal($eligibleMen, '2015-06-01', '2015-07-01');
        $imTotal = $this->mealsGroupTotal($ineligibleMen, '2015-06-01', '2015-07-01');
		return view ('report.month_report_view', compact('clients',
                                                           'emTotal',
                                                           'imTotal',
                                                            'time'));
	}
	
	public function printQuarterReport($date)
	{
		$time=carbon::parse($date);
		$curMonth = $time->month;
		$cur = ceil($curMonth/3);
		$clients = Client::orderBy('lname', 'asc')->get();
				
		return view ('report.quarter_report_view', compact('clients', 'cur'));
	}
	
	public function printAnnualReport($date)
	{
		$clients = Client::orderBy('lname', 'asc')->get();
		$time=carbon::parse($date);
		$year = $time->year;;
				
		return view ('report.annual_report_view', compact('clients', 'year'));
	}


    /**
     * @param $stdate
     * @param $edate
     * @return array
     */
    public function mealsTotal($stdate, $edate)
    {
        $clients = Client::orderBy('lname', 'asc')->get();
        $mealTotal = array();
        for ($i=1;$i<=31;$i++) { $dayTotal[$i] = 0; }
        foreach($clients as $client)
        {
            $id = $client->id;
            $mealTotal[$id]=0;
            $rowMeals[$id] = $client->meal()->where('date_fed', '>=', $stdate)
                ->where('date_fed', '<', $edate)
                ->get()->toArray();
            foreach ($rowMeals[$id] as $row)
            {
                $b = $row['breakfast'];
                $l = $row['lunch'];
                $d = $row['dinner'];
                $mealTotal[$id] += ($b + $l + $d);
            }
        }
        return $mealTotal;
    }

    /**
     * @param $stdate
     * @param $edate
     * @return array
     */
    public function mealsGroupTotal($clients,$stdate, $edate)
    {
        $mealTotal = array();
        for ($i=1;$i<=31;$i++) { $dayTotal[$i] = 0; }
        $mTotals = array();
        $mealTotal = $btotal = $ltotal = $dtotal  =0;
        foreach($clients as $client)
        {
            $id = $client->id;
            $rowMeals[$id] = $client->meal()->where('date_fed', '>=', $stdate)
                ->where('date_fed', '<', $edate)
                ->get()->toArray();
            foreach ($rowMeals[$id] as $row)
            {
                $b = $row['breakfast'];
                $l = $row['lunch'];
                $d = $row['dinner'];
                $btotal += $b;
                $ltotal += $l;
                $dtotal += $d;
                $mealTotal += ($b + $l + $d);
            }
            $mTotals = array('b' => $btotal, 'l' => $ltotal, 'd' => $dtotal, 't' => $mealTotal);
        }
        return $mTotals;
    }


}
