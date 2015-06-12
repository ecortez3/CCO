<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Client;
use Carbon\Carbon;

class ReportController extends Controller {

	public function viewIndex()
	{
		$time = Carbon::now();
		$clients = Client::orderBy('lastName', 'asc')->get();
		return view ('report.reporter_index', compact('clients', 'time'));
	}
	
	public function nextMonth($month)
	{
		$time=carbon::parse($month);
		$time =$time->addMonth(1);
		$clients = Client::orderBy('lastName', 'asc')->get();
		return view ('report.reporter_index', compact('clients', 'time'));
	}
	
	public function previousMonth($month)
	{
		$time=carbon::parse($month);
		$time=$time->subMonth(1);
		$clients = Client::orderBy('lastName', 'asc')->get();
		return view ('report.reporter_index', compact('clients', 'time'));
	}
	
	public function printMonth($date)
	{
		$time=carbon::parse($date);
		$clients = Client::orderBy('lastName', 'asc')->get();
		return view ('report.month_view', compact('clients', 'time'));
		
	}

	public function printQuarter($date)
	{
		$time=carbon::parse($date);
		$curMonth = $time->month;
		$cur = ceil($curMonth/3);
		
		$clients = Client::orderBy('lastName', 'asc')->get();
		
		return view ('report.quarter_view', compact('clients', 'cur'));
	}
	
	public function printAnnual($date)
	{
		$clients = Client::orderBy('lastName', 'asc')->get();
		$time=carbon::parse($date);
		$year = $time->year;
		
		return view ('report.annual_view', compact('clients', 'year'));
	}
	
	public function printMonthReport($date)
	{
		$time=carbon::parse($date);
		$meal = App\Meal::where(YEAR
		$clients = Client::orderBy('lastName', 'asc')->get();
				
		return view ('report.month_report_view', compact('clients', 'time'));
	}
	
	public function printQuarterReport($date)
	{
		$time=carbon::parse($date);
		$curMonth = $time->month;
		$cur = ceil($curMonth/3);
		$clients = Client::orderBy('lastName', 'asc')->get();
				
		return view ('report.quarter_report_view', compact('clients', 'cur'));
	}
	
	public function printAnnualReport($date)
	{
		$clients = Client::orderBy('lastName', 'asc')->get();
		$time=carbon::parse($date);
		$year = $time->year;;
				
		return view ('report.annual_report_view', compact('clients', 'year'));
	}
	
	// public function breakfastReport($time)
	// {
		
	// }


}
