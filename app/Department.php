<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	/**
	 * The table and primary key associated with the model.
	 *
	 * @var string
	 * @var string
	 */
	protected $table = 'departments';
	protected $primaryKey = 'department_id';

	/**
	 * The storage format of the model's date columns.
	 *
	 * @var string
	 */
	protected $dateFormat = 'U';
}
