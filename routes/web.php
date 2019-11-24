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

Route::get('/', function () {
    return view('frontend.home.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('', 'DashboardController@index')->name('admin.index');

    Route::group(['prefix' => 'users'], function () {
        Route::get('', 'UserController@index')->name('admin.users.index');
        Route::post('', 'UserController@store')->name('admin.users.store');
        Route::put('', 'UserController@update')->name('admin.users.update');
        Route::delete('', 'UserController@destroy')->name('admin.users.destroy');
    });

    Route::group(['prefix' => 'operators'], function () {
        Route::get('', 'OperatorsController@index')->name('admin.operators.index');
        Route::post('', 'OperatorsController@store')->name('admin.operators.store');
        Route::get('{id}/edit', 'OperatorsController@edit')->name('admin.operators.edit');
        Route::put('{operator}', 'OperatorsController@update')->name('admin.operators.update');
        Route::get('bus/{id}/edit', 'OperatorsController@editBus')->name('admin.operators.edit.bus');
        Route::put('bus/{id}/edit', 'OperatorsController@updateBus')->name('admin.operators.update.bus');
    });
    
});