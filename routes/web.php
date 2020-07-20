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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('can:edit-users')->group(function () {
    Route::get('/manage', 'UsersController@index')->name('admin.manage');
    Route::post('/manage', 'UsersController@show')->name('admin.manage');
    
    Route::get('/manage/{id}', 'UsersController@edit')->name('admin.manage.user');


    Route::post('/manage/{id}', 'UsersController@update')->name('admin.manage.roles');
});


