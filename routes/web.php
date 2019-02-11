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

    // Student route
    Route::group(['prefix' => 'academicprofile'], function () {
        Route::post('create' , ['as' => 'createStudent', 'uses' => 'AcademicProfileController@create']);
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

    // Access Group route
    Route::group(['prefix' => 'accessgroup'], function () {
        Route::post('create' , 'AccessGroupController@create');
    });

    // User Card route
    Route::group(['prefix' => 'usercard'], function () {
        Route::post('create' , 'UserCardController@create');
    });

    // User Group route
    Route::group(['prefix' => 'usergroup'], function () {
        Route::post('create' , 'UserGroupController@create');
    });

    // User Payment route
    Route::group(['prefix' => 'userpayment'], function () {
        Route::post('create' , 'UserPaymentController@create');
    });

    // User Profile route
    Route::group(['prefix' => 'userprofile'], function () {
        Route::post('create' , 'UserProfileController@create');
    });

    // User Device route
    Route::group(['prefix' => 'userdevice'], function () {
        Route::post('create' , 'UserDeviceController@create');
        Route::get('platform/{platform}' , 'UserDeviceController@getDeviceByPlatform');
    });

    // THird Party route
    Route::group(['prefix' => 'thirdparty'], function () {
        Route::post('create' , 'ThirdPartyController@create');
    });

    // Sponsor route
    Route::group(['prefix' => 'sponsor'], function () {
        Route::post('create' , 'SponsorController@create');
    });

    // Scholarship route
    Route::group(['prefix' => 'scholarship'], function () {
        Route::post('create' , 'ScholarshipController@create');
    });

    // UserScholarship route
    Route::group(['prefix' => 'userscholarship'], function () {
        Route::post('create' , 'UserScholarshipController@create');
    });

    // Questipn Spec route
    Route::group(['prefix' => 'questionspec'], function () {
        Route::post('create' , 'QuestionSpecController@create');
    });

});
