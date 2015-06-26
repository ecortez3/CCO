<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Client;
use Carbon\Carbon;

class ReportController extends Controller {

    public function viewIndex()
    {
        // We need to get all clients, then get all meals for each client (two arrays)
        $time = Carbon::now();
        $clients = Client::orderBy('lname', 'asc')->get();
        $mealsTotal = $mealsDayTotal = $dayTotal = array();
        $dayGrandTotal = 0;
        for ($i=1;$i<=31;$i++) { $dayTotal[$i] = 0; }
        foreach($clients as $client)
        {
            $id = $client->id;
            $mealsTotal[$id]=0;
            for ($i=1;$i<=31;$i++)
            {
                $strdate = $time->year . '-' . $time->month . '-' . $i;
                $current_day = date('Y-m-d', strtotime($strdate));
               if (!$rowMeals[$id][$i] = $client->meal()->where('date_fed', '=', $current_day)->get()->toArray())
               {
                    $rowMeals[$id][$i][0]['breakfast'] = $rowMeals[$id][$i][0]['lunch'] = $rowMeals[$id][$i][0]['dinner'] = 0;
               }
                $mealsDayTotal[$id][$i] = $rowMeals[$id][$i][0]['breakfast'] + $rowMeals[$id][$i][0]['lunch'] + $rowMeals[$id][$i][0]['dinner'] ;
                $mealsTotal[$id] += ($rowMeals[$id][$i][0]['breakfast'] + $rowMeals[$id][$i][0]['lunch'] + $rowMeals[$id][$i][0]['dinner']) ;
                $dayTotal[$i] += ($rowMeals[$id][$i][0]['breakfast'] + $rowMeals[$id][$i][0]['lunch'] + $rowMeals[$id][$i][0]['dinner']) ;
                $dayGrandTotal += $mealsDayTotal[$id][$i];
            }
        }
        return view ('report.reporter_index', compact('clients', 'rowMeals', 'mealsTotal', 'mealsDayTotal', 'dayTotal', 'dayGrandTotal', 'time'));
    }
	
	public function nextMonth($month)
	{
		$time=carbon::parse($month);
		$time =$time->addMonth(1);
		$clients = Client::orderBy('lname', 'asc')->get();
		return view ('report.reporter_index', compact('clients', 'time'));
	}
	
	public function previousMonth($month)
	{
		$time=carbon::parse($month);
		$time=$time->subMonth(1);
		$clients = Client::orderBy('lname', 'asc')->get();
		return view ('report.reporter_index', compact('clients', 'time'));
	}
	
	public function printMonth($date)
	{
		$time=carbon::parse($date);
		$clients = Client::orderBy('lname', 'asc')->get();
		return view ('report.month_view', compact('clients', 'time'));
		
	}

	public function printQuarter($date)
	{
		$time=carbon::parse($date);
		$curMonth = $time->month;
		$cur = ceil($curMonth/3);
		
		$clients = Client::orderBy('lname', 'asc')->get();
		
		return view ('report.quarter_view', compact('clients', 'cur'));
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
		$clients = Client::orderBy('lname', 'asc')->get();
				
		return view ('report.month_report_view', compact('clients', 'time'));
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
	
	// public function breakfastReport($time)
	// {
		
	// }


}
