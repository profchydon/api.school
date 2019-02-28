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

    // Scholarship route
    Route::group(['prefix' => 'scholarship'], function () {
        Route::post('create' , 'ScholarshipController@create');
    });

    // Scholarship Sponsor route
    Route::group(['prefix' => 'scholarshipsponsor'], function () {
        Route::post('create' , 'ScholarshipSponsorController@create');
    });

    // School route
    Route::group(['prefix' => 'school'], function () {
        Route::post('create' , 'SchoolController@create');
    });

    // Scholarship Collection route
    Route::group(['prefix' => 'scholarshipcollection'], function () {
        Route::post('create' , 'ScholarshipCollectionController@create');
    });

    // Scholarship Requirement route
    Route::group(['prefix' => 'scholarshiprequirement'], function () {
        Route::post('create' , 'ScholarshipRequirementController@create');
    });

    // Scholarship Requirement route
    Route::group(['prefix' => 'scholarshiprequirementresponse'], function () {
        Route::post('create' , 'ScholarshipRequirementResponseController@create');
    });

    // Question Spec route
    Route::group(['prefix' => 'questionspec'], function () {
        Route::post('create' , 'QuestionSpecController@create');
    });

    // Question route
    Route::group(['prefix' => 'question'], function () {
        Route::post('create' , 'QuestionController@create');
    });

    // Answer route
    Route::group(['prefix' => 'answer'], function () {
        Route::post('create' , 'AnswerController@create');
    });

    // Blog route
    Route::group(['prefix' => 'blog'], function () {
        Route::post('create' , 'BlogController@create');
    });

    // College route
    Route::group(['prefix' => 'college'], function () {
        Route::post('create' , 'CollegeController@create');
    });

    // Contact route
    Route::group(['prefix' => 'contact'], function () {
        Route::post('create' , 'ContactController@create');
    });

    // Course route
    Route::group(['prefix' => 'course'], function () {
        Route::post('create' , 'CourseController@create');
    });

    // Faculty route
    Route::group(['prefix' => 'faculty'], function () {
        Route::post('create' , 'FacultyController@create');
    });

    // Oauth route
    Route::group(['prefix' => 'oauth'], function () {
        Route::post('create' , 'OauthController@create');
    });

    // Payment Records route
    Route::group(['prefix' => 'paymentrecord'], function () {
        Route::post('create' , 'PaymentRecordController@create');
    });

});
