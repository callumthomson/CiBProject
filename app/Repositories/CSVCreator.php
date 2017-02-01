<?php namespace App\Repositories;

use App\Activity;
use App\Customer;
use App\Department;
use App\Project;

use App\Role;
use App\Task;
use App\TimesheetEntry;
use App\User;
use DB;

class CSVCreator
{
	public function __construct()
	{
		$this->activities();
		$this->customers();
		$this->departments();
		$this->projects();
		$this->project_users();
		$this->roles();
		$this->tasks();
		$this->timesheet_entries();
		$this->users();
		$this->zip();
	}

	private function activities()
	{
		$handle = fopen(storage_path('app/csv/activities.csv'), 'w');
		foreach(Activity::all() as $activity) {
			$activity = $activity->toArray();
			fwrite($handle, implode(',', $activity). PHP_EOL);
		}
		fclose($handle);
	}
	private function customers()
	{
		$handle = fopen(storage_path('app/csv/customers.csv'), 'w');
		foreach(Customer::all() as $customer) {
			$customer = $customer->toArray();
			fwrite($handle, implode(',', $customer). PHP_EOL);
		}
		fclose($handle);
	}
	private function departments()
	{
		$handle = fopen(storage_path('app/csv/departments.csv'), 'w');
		foreach(Department::all() as $department) {
			$department = $department->toArray();
			fwrite($handle, implode(',', $department). PHP_EOL);
		}
		fclose($handle);
	}
	private function projects()
	{
		$handle = fopen(storage_path('app/csv/projects.csv'), 'w');
		foreach(Project::all() as $project) {
			$project = $project->toArray();
			fwrite($handle, implode(',', $project). PHP_EOL);
		}
		fclose($handle);
	}
	private function project_users()
	{
		$handle = fopen(storage_path('app/csv/project_users.csv'), 'w');
		foreach(DB::table('project_users')->get() as $project_user) {
			fwrite($handle, implode(',', (array)$project_user). PHP_EOL);
		}
		fclose($handle);
	}
	private function roles()
	{
		$handle = fopen(storage_path('app/csv/roles.csv'), 'w');
		foreach(Role::all() as $role) {
			$role = $role->toArray();
			fwrite($handle, implode(',', $role). PHP_EOL);
		}
		fclose($handle);
	}
	private function tasks()
	{
		$handle = fopen(storage_path('app/csv/tasks.csv'), 'w');
		foreach(Task::all() as $task) {
			$task = $task->toArray();
			fwrite($handle, implode(',', $task). PHP_EOL);
		}
		fclose($handle);
	}
	private function timesheet_entries()
	{
		$handle = fopen(storage_path('app/csv/timesheet_entries.csv'), 'w');
		foreach(TimesheetEntry::all() as $entry) {
			$entry = $entry->toArray();
			fwrite($handle, implode(',', $entry). PHP_EOL);
		}
		fclose($handle);
	}
	private function users()
	{
		$handle = fopen(storage_path('app/csv/users.csv'), 'w');
		foreach(User::all() as $user) {
			$user = $user->toArray();
			fwrite($handle, implode(',', $user). PHP_EOL);
		}
		fclose($handle);
	}

	private function zip()
	{
		new ZipCreator();
	}
}