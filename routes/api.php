<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');

// User
Route::prefix('/user')->group(function () {
    Route::post('/', 'User\DashboardController@index');
    Route::resource('/post', 'User\Post1Controller');
    Route::resource('/post2', 'User\Post2Controller');
    Route::resource('/post3', 'User\Post3Controller');
    Route::resource('/profile', 'User\ProfileController');
    Route::resource('/changepassword', 'User\ChangePasswordController');
});

// Admin
Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\DashboardController@index');
    Route::resource('/post', 'Admin\Post1Controller');
    Route::resource('/post2', 'Admin\Post2Controller');
    Route::resource('/post3', 'Admin\Post3Controller');
    Route::resource('/user', 'Admin\UserController');
    Route::resource('/changepassword', 'Admin\ChangePasswordController');
});
// Post
Route::resource('/post', 'PostController');

// Comment
Route::resource('/comment', 'CommentController');

// Report
Route::resource('/report', 'ReportController');

// // Mail
Route::post('/password/forgot', 'ForgotPasswordController@send');
Route::post('/password/reset', 'ForgotPasswordController@reset');
