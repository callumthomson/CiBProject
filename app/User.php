<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The table and primary key associated with the model.
     *
     * @var string
     * @var string
     */
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        //
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token'
    ];

    public function department()
    {
        return $this->hasOne('App\Department', 'department_id', 'department_id');
    }

    public function role()
    {
        return $this->hasOne('App\Role', 'role_id', 'role_id');
    }

    public function projects()
    {
        return $this->belongsToMany('App\Project', 'project_users', 'user_id', 'project_id');
    }

    public function entries()
    {
        return $this->hasMany('App\TimesheetEntry', 'user_id', 'user_id');
    }
}
