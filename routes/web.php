<?php

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

Auth::routes();

Route::get('/', 'PostsController@index')->name('home');
Route::get('/online', 'PagesController@online')->name('online');
Route::post('posts/{post}/comments', 'CommentsController@store');
Route::resource('posts', 'PostsController');
Route::resource('posts.comments', 'CommentsController');

Route::middleware('permission:view-dashboard')->prefix('admin')->group(function() {
    Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
    Route::post('getusers', 'Admin\AjaxController@getUsers');
    Route::resource('posts', 'PostsController', ['as' => 'admin']);
    Route::resource('comments', 'CommentsController', ['as' => 'admin', 'only' => ['index', 'edit', 'destroy']]);
    Route::resource('accounts', 'AccountsController', ['as' => 'admin', 'except' => ['show']]);
    Route::resource('roles', 'Admin\RolesController', ['as' => 'admin', 'except' => ['show']]);
  });
