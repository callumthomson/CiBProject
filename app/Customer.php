<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	/**
	 * The table and primary key associated with the model.
	 *
	 * @var string
	 * @var string
	 */
	protected $table = 'customers';
	protected $primaryKey = 'customer_id';

	/**
	 * The storage format of the model's date columns.
	 *
	 * @var string
	 */
	protected $dateFormat = 'U';

	public function projects()
	{
		return $this->hasMany('App\Project', 'customer_id', 'customer_id');
	}
}
