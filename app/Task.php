<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	/**
	 * The table and primary key associated with the model.
	 *
	 * @var string
	 * @var string
	 */
	protected $table = 'tasks';
	protected $primaryKey = 'task_id';

	/**
	 * The storage format of the model's date columns.
	 *
	 * @var string
	 */
	protected $dateFormat = 'U';

	public function project()
	{
		return $this->hasOne('App\Project', 'project_id', 'project_id');
	}

	public function entries()
	{
		return $this->hasMany('App\TimesheetEntry', 'task_id', 'task_id');
	}
}
