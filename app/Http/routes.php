<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('home');
});

/*
 * Authentication
 */
Route::get('login', 'AuthController@getLoginPage');
Route::group(['prefix' => 'auth'], function() {
    Route::post('login', 'AuthController@login');
    Route::get('logout', 'AuthController@logout');
});

/*
 * Authenticated Users Only
 */
Route::group(['middleware' => 'authenticated'], function() {
    /*
     * Visual routes
     */
    Route::get('home', 'HomeController@showHome');
    Route::group(['prefix' => 'myprojects'], function() {
        Route::get('/', 'MyProjectsController@showMyProjects');
        Route::get('{project}/approve', 'MyProjectsController@showApproveTimesheets');
        Route::get('{project}/timesheets', 'MyProjectsController@showTimesheets');
    });
    Route::group(['prefix' => 'costcentre'], function() {
        Route::get('/', 'CostCentreController@showAllTimesheets');
        Route::get('approved', 'CostCentreController@showApprovedTimesheets');
    });
    Route::group(['prefix' => 'reports'], function() {
        Route::get('/', 'ReportsController@showReports');
    });
    Route::group(['prefix' => 'export'], function() {
        Route::get('/', 'ExportController@showExportPage');
        Route::get('download', 'ExportController@download');
    });

    /*
     * Action routes
     */
    Route::get('approveTimesheet/{tsid}', 'MyProjectsController@approveTimesheet');
    Route::get('rejectTimesheet/{tsid}', 'MyProjectsController@rejectTimesheet');
});