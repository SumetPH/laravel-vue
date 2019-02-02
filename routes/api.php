<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register','Api\AuthController@register');
Route::post('/login','Api\AuthController@login');

 // User
Route::prefix('/user')->group(function(){
    Route::post('/','User\UserController@index');
    Route::resource('/post','User\PostController');
    Route::resource('/post2','User\Post2Controller');
//     Route::post('/logout', 'Auth\LoginController@logout');
//     Route::resource('/profile','User\ProfileController');
//     Route::resource('/post3','User\Post3Controller');
//     Route::resource('/changepassword','User\ChangePasswordController');
});

// Admin
Route::prefix('admin')->group(function(){
        Route::get('/','Admin\AdminController@index');
//     Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
//     Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
//     Route::post('/logout', 'Auth\AdminLoginController@logout');
//     Route::resource('/user','Admin\UserController');
//     Route::resource('/post','Admin\PostController');
//     Route::resource('/post2','Admin\Post2Controller');
//     Route::resource('/post3','Admin\Post3Controller');
//     Route::resource('/changepassword','Admin\ChangePasswordController');
});