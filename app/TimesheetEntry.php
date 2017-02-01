<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class TimesheetEntry extends Model
{
	/**
	 * The table and primary key associated with the model.
	 *
	 * @var string
	 * @var string
	 */
	protected $table = 'timesheet_entries';
	protected $primaryKey = 'entry_id';

	/**
	 * The storage format of the model's date columns.
	 *
	 * @var string
	 */
	protected $dateFormat = 'U';

	public function task()
	{
		return $this->hasOne('App\Task', 'task_id', 'task_id');
	}

	public function activity()
	{
		return $this->hasOne('App\Activity', 'activity_id', 'activity_id');
	}

	public function user()
	{
		return $this->hasOne('App\User', 'user_id', 'user_id');
	}

	public function getTypeAttribute()
	{
		if($this->attributes['task_id'] == null && $this->attributes['activity_id'] != null) {
			return 'activity';
		} elseif($this->attributes['activity_id'] == null && $this->attributes['task_id'] != null) {
			return 'task';
		}
	}

	public function getDateAttribute()
	{
		return Carbon::parse($this->attributes['date']);
	}
	public function setDateAttribute(Carbon $date)
	{
		$this->attributes['date'] = $date->toDateString();
	}
}
