<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
	/**
	 * The table and primary key associated with the model.
	 *
	 * @var string
	 * @var string
	 */
	protected $table = 'activities';
	protected $primaryKey = 'activity_id';

	/**
	 * The storage format of the model's date columns.
	 *
	 * @var string
	 */
	protected $dateFormat = 'U';


	public function entries()
	{
		return $this->hasMany('App\TimesheetEntry', 'activity_id', 'activity_id');
	}
}
