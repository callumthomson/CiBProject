<?php
namespace App\Repositories;

class ZipCreator
{
	private $files = [
		'activities.csv',
		'customers.csv',
		'departments.csv',
		'projects.csv',
		'project_users.csv',
		'roles.csv',
		'tasks.csv',
		'timesheet_entries.csv',
		'users.csv',
	];
	public function __construct()
	{
		if($this->files_exist()) {
			$this->zip();
		}
	}

	private function files_exist()
	{
		foreach($this->files as $file) {
			if(!file_exists(storage_path('app/csv/' . $file))) {
				return false;
			}
		}
		return true;
	}

	private function zip()
	{
		$zip = new \ZipArchive();
		$zip->open(public_path().'/timesheets.zip', \ZipArchive::CREATE);

		foreach($this->files as $file) {
			$zip->addFile(storage_path('app/csv/' . $file), $file);
		}

		$zip->close();

		//check to make sure the file exists
		return file_exists(public_path().'timesheets.zip');
	}
}