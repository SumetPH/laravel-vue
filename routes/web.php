<?php
Route::get('/{any}', function () {
	return view('app');
  })->where('any', '.*');

// Route::view('{path?}', 'app');

// Auth::routes();

// // Index
// Route::get('/', function () {
//     return view('welcome');
// });

// // First
// Route::get('/home','HomeController@index')->name('home');
// Route::get('/admin','AdminController@index')->name('admin');

// // Admin
// Route::prefix('admin')->group(function(){
//     Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
//     Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
//     Route::post('/logout', 'Auth\AdminLoginController@logout');
//     Route::resource('/user','Admin\UserController');
//     Route::resource('/post','Admin\PostController');
//     Route::resource('/post2','Admin\Post2Controller');
//     Route::resource('/post3','Admin\Post3Controller');
//     Route::resource('/changepassword','Admin\ChangePasswordController');
// });

// // User
// Route::prefix('/user')->group(function(){
//     Route::post('/logout', 'Auth\LoginController@logout');
//     Route::resource('/profile','User\ProfileController');
//     Route::resource('/post','User\PostController');
//     Route::resource('/post2','User\Post2Controller');
//     Route::resource('/post3','User\Post3Controller');
//     Route::resource('/changepassword','User\ChangePasswordController');

// });

// // Comment
// Route::resource('/postcomment','PostCommentController');

// // Mail
// Route::get('/forgotpassword','ForgotPasswordController@index');
// Route::post('/forgotpassword','ForgotPasswordController@send');
// Route::get('/forgotpassword/{hash}','ForgotPasswordController@hash');
// Route::post('/forgotpassword/reset','ForgotPasswordController@reset');
