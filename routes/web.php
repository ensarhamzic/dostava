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
    Route::get('/users', 'UsersController@index')->name('admin.manage');
    Route::post('/users', 'UsersController@show')->name('admin.manage');
    
    Route::get('/users/{id}', 'UsersController@edit')->name('admin.manage.user');


    Route::put('/users/{id}', 'UsersController@update')->name('admin.manage.roles');
});

Route::middleware('can:edit-food')->group(function () {
    Route::get('/restaurants', 'RestaurantsController@index')->name('manage.restaurants');
    Route::get('/restaurants/create', 'RestaurantsController@create')->name('restaurants.create');
    Route::post('/restaurants/create', 'RestaurantsController@store')->name('restaurants.store');

    Route::get('/menus', 'MenusController@index')->name('menu.index');
    Route::get('/menu/create', 'MenusController@create')->name('menu.create');
    Route::post('/menu/create', 'MenusController@store')->name('menu.store');

    Route::get('/food/{id}', 'FoodController@index')->name('food.create');
    Route::get('/food/create/{id}', 'FoodController@create')->name('food.create');
    Route::post('/food/create/{id}', 'FoodController@store')->name('food.store');
});


