<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CostCentreController extends Controller
{
    public function showAllTimesheets()
	{
		return view('pages.costcentre.costcentre', [
			'title' => 'Approve Cost Centre Timesheets',
			'page' => 'costcentre'
		]);
	}

	public function showApprovedTimesheets()
	{
		return view('pages.costcentreapproved.costcentreapproved', [
			'title' => 'Show Approved Cost Centre Timesheets',
			'page' => 'costcentre'
		]);
	}
}
