<?php

namespace App\Http\Controllers\Api;

use App\TimesheetEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;
use Auth;

class SubmissionController extends Controller
{
    public function submit(Request $request)
	{
		$validator = $this->validateSubmission($request);
		if($validator->fails()) {
			return response(null, 422);
		}
		$entry = new TimesheetEntry();
		if($request->has('task_id')) {
			$entry->task_id = $request->input('task_id');
		} else {
			$entry->activity_id = $request->input('activity_id');
		}
		$entry->user_id = Auth::user()->user_id;
		$entry->date = Carbon::parse($request->input('date'));
		$entry->hours_spent = $request->input('hours_spent');
		$entry->save();
	}

	private function validateSubmission(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'task_id' => 'required_without:activity_id',
			'activity_id' => 'required_without:task_id',
			'date' => 'required|date_format:Y-m-d',
			'hours_spent' => 'required|between:0,24',
		]);
		return $validator;
	}
}
