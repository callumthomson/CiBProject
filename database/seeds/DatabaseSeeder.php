<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'created_at' => Carbon::now()->timestamp,
            'updated_at' => Carbon::now()->timestamp,
            'name' => 'Customer 1',
        ]);
        DB::table('departments')->insert([
            'created_at' => Carbon::now()->timestamp,
            'updated_at' => Carbon::now()->timestamp,
            'name' => 'Department 1',
            'budget' => '3000000',
        ]);
        /* ACTIVITIES ****************************************** */
        DB::table('activities')->insert([
            [
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'name' => 'Internal Team Meeting',
            ],
            [
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'name' => 'Internal Improvements',
            ],
            [
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'name' => 'Sickness',
            ],
            [
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'name' => 'Public Holiday',
            ],
            [
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'name' => 'Annual Leave',
            ],
            [
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'name' => 'Training',
            ],
            [
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'name' => 'Management Time',
            ],
            [
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'name' => 'Maternity Leave',
            ],
            [
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'name' => 'Personal',
            ]
        ]);
        /* ****************************************** */
        DB::table('roles')->insert([
            'created_at' => Carbon::now()->timestamp,
            'updated_at' => Carbon::now()->timestamp,
            'name' => 'Role 1',
            'rate' => 1500,
        ]);
        DB::table('users')->insert([
            'created_at' => Carbon::now()->timestamp,
            'updated_at' => Carbon::now()->timestamp,
            'username' => 'callum',
            'password' => Hash::make('a'),
            'remember_token' => null,
            'api_token' => 'qcG8P1HCvsq7beaMFshkL0ePs4x5njqaXop8XApfiEpbkidwccC7YmQqiTnHnfIo',
            'department_id' => 1,
            'role_id' => 1,
        ]);
        DB::table('projects')->insert([
            'created_at' => Carbon::now()->timestamp,
            'updated_at' => Carbon::now()->timestamp,
            'name' => 'Project 1',
            'status' => 'sta',
            'manager_user_id' => 1,
            'customer_id' => 1,
        ]);
        DB::table('tasks')->insert([
            'created_at' => Carbon::now()->timestamp,
            'updated_at' => Carbon::now()->timestamp,
            'project_id' => 1,
            'name' => 'Task 1',
        ]);
        DB::table('project_users')->insert([
            'project_id' => 1,
            'user_id' => 1,
        ]);
        /* TIMESHEET ENTRIES ****************************************** */
        DB::table('timesheet_entries')->insert([
            [
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'task_id' => 1,
                'activity_id' => null,
                'user_id' => 1,
                'date' => Carbon::now()->toDateString(),
                'hours_spent' => 3.2,
                'approved' => false,
            ],
            [
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'task_id' => null,
                'activity_id' => 1,
                'user_id' => 1,
                'date' => Carbon::now()->toDateString(),
                'hours_spent' => 6.0,
                'approved' => false,
            ]
        ]);
        /* ****************************************** */
    }
}
