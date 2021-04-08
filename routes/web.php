<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'BlogController@index');

Auth::routes(['verify' => true]);

Route::middleware(['verified'])->group(function () {
  Route::get('/profile', 'UserController@index')->name('profile');
  Route::resource('/blog', 'BlogController')->except([
    'index', 'show'
  ]);
  Route::get('/course/join/{id}', 'CourseController@join')->name('course.join');
  Route::get('/course/unjoin/{id}', 'CourseController@unjoin')->name('course.unjoin');
});

Route::middleware(['verified', 'admin'])->group(function () {
  Route::get('/admin', 'HomeController@admin')->name('admin');
});

Route::resource('/blog', 'BlogController')->only([
  'index', 'show'
]);

Route::get('/course', 'CourseController@index')->name('course.index');
Route::get('/course/{slug}', 'CourseController@show')->name('course.show');

// Nested Route
Route::resource('blog.comments', 'CommentController')->shallow();