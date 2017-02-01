<?php

/*
|--------------------------------------------------------------------------
| Application Routes (API)
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'api', 'namespace' => 'Api'], function () {
    /*
     * Authorize with username and pass to receive api token
     */
    Route::post('auth', 'AuthController@auth');

    /*
     * Authenticated users only
     */
    Route::group(['middleware' => 'api_auth'], function() {
        Route::get('activities', 'ApiController@activities');
        /*
         * Information specific to 'me'
         */
        Route::group(['prefix' => 'me'], function() {
            Route::get('projects', 'MeController@projects');
            Route::get('department', 'MeController@department');
        });
        Route::post('submit', 'SubmissionController@submit');
    });
});
