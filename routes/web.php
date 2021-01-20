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
Route::get('/', 'HomeController@index')->name('home')->middleware('role:user');
Route::get('/dashboard', 'Admin\AdminController@index')->middleware('role:admin|super admin')->name('dashboard');

// Admin Page
Route::resource('users', 'Admin\UsersController');
Route::get('/users-dinas','Admin\UsersController@usersDinas')->name('users-dinas');
Route::get('/informasi-user/{user}','Admin\UsersController@infoUser');
Route::get('/instansi','Admin\UsersController@showInstansi')->name('instansi');
Route::resource('indikators', 'Admin\IndikatorsController');
Route::resource('domains', 'Admin\DomainController');
Route::resource('aspeks', 'Admin\AspekController');
Route::get('/findKetDomain', 'Admin\DomainController@findKet');
Route::get('/findKetAspek', 'Admin\AspekController@findKet');
Route::get('/indeks-spbe/{id}', 'Admin\AdminController@countIndeks');

// User Page
Route::resource('rekaps', 'RekapController');
Route::post('/upload', 'RekapController@fileUpload');
Route::get('/download-file/{file}', 'RekapController@downloadFile');
Route::delete('/delete-file/{file}', 'RekapController@deleteFile');
Route::get('/rekap/{id}', 'RekapController@detailRekap');


Route::get('/indikator/{id}', 'HomeController@showIndikator');
Route::get('/user-detail/{user}', 'HomeController@show');
Route::match(['put','patch'],'/user-update/{user}', 'HomeController@userUpdate')->name('user-update');
Route::match(['put','patch'],'/avatar-update/{id}', 'HomeController@avatarUpdate')->name('avatar-update');
Route::match(['put','patch'],'/password-update', 'HomeController@passwordUpdate')->name('password-update');

Route::get('/export-excel/{id}','RekapController@export');
