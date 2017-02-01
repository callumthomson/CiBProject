<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

class MeController extends Controller
{
	/**
	 * Get all projects and project tasks user is assigned to
	 *
	 * @return mixed
	 */
	public function projects()
	{
		foreach(Auth::user()->projects as $project) {
			$project->tasks;
		}
		$projects = Auth::user()->projects;
		$return = [];
		foreach($projects as $project) {
			if($project->active) {
				$return[] = $project;
			}
		}
		return $return;
	}

	/**
	 * Get department and department activities user is assigned to
	 *
	 * @return array
	 */
	public function department()
	{
		return [
			Auth::user()->department,
		];
	}
}
