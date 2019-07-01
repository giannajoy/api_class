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
    return view('dashboard');
});
Auth::routes();
Route::get('cows','CowController@showAll');
Route::get('cow/add','CowController@mockAdd');
//delete
Route::post ('/cow/delete/{id}', 'CowController@deleteCow' );
//view new
Route::get('cows-v','CowController@getAllCows');
//Add new
Route::post('cow/save','CowController@addCow');

Route::get('staff','StaffController@listAll');
Route::get('staff/add','StaffController@mockAdd');
