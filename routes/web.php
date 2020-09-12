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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/dashboard', 'Admin\AdminController@index')->middleware('role:admin|super admin')->name('dashboard');
Route::resource('users', 'Admin\UsersController');
Route::get('/users-dinas','Admin\UsersController@usersDinas')->name('users-dinas');
Route::post('/upload}', 'Admin\UsersController@up')->name('upload-photo');
