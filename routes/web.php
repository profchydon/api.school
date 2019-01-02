<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

Route::group(['prefix' => 'api/v1'], function () {

    // Users route
    Route::group(['prefix' => 'users'], function () {
        Route::post('create' , ['as' => 'createUser', 'uses' => 'UserController@create']);
        Route::get('' , ['as' => 'allUsers', 'uses' => 'UserController@users']);
        Route::get('{id}' , ['as' => 'fetchAuser', 'uses' => 'UserController@fetchAUser']);
        Route::post('update' , ['as' => 'updateUser', 'uses' => 'UserController@updateUser']);
        Route::post('sendmail' , ['as' => 'sendMail', 'uses' => 'UserController@sendVerificationMail']);
    });

    // Verifications route
    Route::group(['prefix' => 'verifications'], function () {
        Route::post('create' , 'VerificationController@create');
        Route::post('update' , 'VerificationController@updateVerification');
        Route::post('user/verify' , 'VerificationController@verifyUser');
    });

    // Auth route
    Route::group(['prefix' => 'auth'], function () {
        Route::post('login' , 'AuthController@login');
        Route::post('password_reset' , 'AuthController@passwordReset');
        Route::get('password_reset' , 'AuthController@changePassword');
    });


});
