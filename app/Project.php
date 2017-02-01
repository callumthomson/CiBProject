<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	/**
	 * The table and primary key associated with the model.
	 *
	 * @var string
	 * @var string
	 */
	protected $table = 'projects';
	protected $primaryKey = 'project_id';

	/**
	 * The storage format of the model's date columns.
	 *
	 * @var string
	 */
	protected $dateFormat = 'U';

	protected $statusAliases = [
		'sta' => 'Start Up',
		'def' => 'Definition',
		'del' => 'Delivery',
		'war' => 'Warranty',
		'pla' => 'Planning',
		'com' => 'Completed',
	];

	public function manager()
	{
		return $this->hasOne('App\User', 'user_id', 'manager_user_id');
	}

	public function customer()
	{
		return $this->hasOne('App\Customer', 'customer_id', 'customer_id');
	}

	public function tasks()
	{
		return $this->hasMany('App\Task', 'project_id', 'project_id');
	}

	public function users()
	{
		return $this->belongsToMany('App\User', 'project_users', 'project_id', 'user_id');
	}

	public function setStatusAttribute($status)
	{
		$valid = [
			'sta', 'def', 'del', 'war', 'pla', 'com'
		];
		if(in_array($status, $valid)) {
			$this->attributes['status'] = $status;
		} else {
			$this->attributes['status'] = $valid[0];
		}
	}

	public function getFullStatusAttribute()
	{
		return $this->statusAliases[$this->attributes['status']];
	}

	public function getActiveAttribute()
	{
		$active = [
			'sta', 'def', 'del', 'war'
		];
		return in_array($this->attributes['status'], $active);
	}
}
