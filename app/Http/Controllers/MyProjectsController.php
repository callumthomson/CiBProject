<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\TimesheetEntry;
use App\Project;

class MyProjectsController extends Controller
{
    public function showMyProjects()
	{
		return view('pages.myprojects.myprojects', [
			'title' => 'Your Projects',
			'page' => 'myprojects'
		]);
	}

	public function showApproveTimesheets($projectID)
	{
		$project = Project::find($projectID);
		return view('pages.approvetimesheets.approvetimesheets', [
			'title' => 'Approve Timesheets for '.$project->name,
			'page' => 'myprojects',
			'project' => $project,
		]);
	}

	public function showTimesheets($projectID)
	{
		$project = Project::find($projectID);
		return view('pages.timesheets.timesheets', [
			'title' => 'Show Approved Timesheets for '.$project->name,
			'page' => 'myprojects',
			'project' => $project,
		]);
	}
	
	public function approveTimesheet($tsid, Request $request)
	{
		$timesheet = TimesheetEntry::find($tsid);
		$timesheet->approved = true;
		$timesheet->save();
		$request->session()->flash('success', 'Timesheet was approved.');
		return redirect()->back();
	}
	public function rejectTimesheet($tsid, Request $request)
	{
		TimesheetEntry::destroy($tsid);
		$request->session()->flash('success', 'Timesheet was rejected.');
		return redirect()->back();
	}
}
