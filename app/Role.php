<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	/**
	 * The table and primary key associated with the model.
	 *
	 * @var string
	 * @var string
	 */
	protected $table = 'roles';
	protected $primaryKey = 'role_id';

	/**
	 * The storage format of the model's date columns.
	 *
	 * @var string
	 */
	protected $dateFormat = 'U';
}
