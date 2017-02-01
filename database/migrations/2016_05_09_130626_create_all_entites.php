<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllEntites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('department_id');
            $table->string('created_at', 10);
            $table->string('updated_at', 10);
            $table->string('name');
            $table->integer('budget')->unsigned();

            // Indexes
            $table->unique('name');
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->increments('role_id');
            $table->string('created_at', 10);
            $table->string('updated_at', 10);
            $table->string('name');
            $table->integer('rate')->unsigned();

            // Indexes
            $table->unique('name');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('created_at', 10);
            $table->string('updated_at', 10);
            $table->string('username', 16);
            $table->string('password', 255);
            $table->rememberToken();
            $table->string('api_token', 64)->nullable();
            $table->integer('department_id')->unsigned();
            $table->integer('role_id')->unsigned();

            // Indexes
            $table->unique('username');
            $table->index('department_id');
            // Foreign Key Constraints
            $table->foreign('department_id')
                ->references('department_id')
                ->on('departments')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreign('role_id')
                ->references('role_id')
                ->on('roles')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('created_at', 10);
            $table->string('updated_at', 10);
            $table->string('name');

            // Indexes
            $table->unique('name');
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->increments('project_id');
            $table->string('created_at', 10);
            $table->string('updated_at', 10);
            $table->string('name');
            $table->string('status', 3);
            $table->integer('manager_user_id')->unsigned();
            $table->integer('customer_id')->unsigned();

            // Indexes
            $table->unique('name');
            $table->index('manager_user_id');
            $table->index('customer_id');
            // Foreign Key Constraints
            $table->foreign('manager_user_id')
                ->references('user_id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreign('customer_id')
                ->references('customer_id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('task_id');
            $table->string('created_at', 10);
            $table->string('updated_at', 10);
            $table->integer('project_id')->unsigned();
            $table->string('name');

            // Indexes
            $table->index('project_id');
            $table->unique('name');
            // Foreign Key Constraints
            $table->foreign('project_id')
                ->references('project_id')
                ->on('projects')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });

        Schema::create('activities', function (Blueprint $table) {
            $table->increments('activity_id');
            $table->string('created_at', 10);
            $table->string('updated_at', 10);
            $table->string('name');

            // Indexes
            $table->unique('name');
        });

        Schema::create('project_users', function (Blueprint $table) {
            $table->integer('project_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->primary(['project_id', 'user_id']);

            $table->foreign('project_id')
                ->references('project_id')
                ->on('projects')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('timesheet_entries', function (Blueprint $table) {
            $table->increments('entry_id');
            $table->string('created_at', 10);
            $table->string('updated_at', 10);
            $table->integer('task_id')->unsigned()->nullable();
            $table->integer('activity_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('date', 10);
            $table->double('hours_spent', 3, 1);
            $table->boolean('approved');

            $table->foreign('task_id')
                ->references('task_id')
                ->on('tasks')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('activity_id')
                ->references('activity_id')
                ->on('activities')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('timesheet_entries');
        Schema::drop('project_users');
        Schema::drop('tasks');
        Schema::drop('projects');
        Schema::drop('users');
        Schema::drop('customers');
        Schema::drop('roles');
        Schema::drop('activities');
        Schema::drop('departments');
    }
}
