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
Route::get('code',function(){
  return view('auth.code');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::post('verify-code','Auth\LoginController@verifyCode');
Route::group(['middleware' => ['auth']], function() {
  Route::get('/', function () {
      return view('dashboard');
  });

  Route::get('cows','CowController@showAll');
  Route::get('allCows','CowController@allCows');
  Route::post ('/cow/delete/{id}', 'CowController@deleteCow' );
  Route::get('cow/add','CowController@mockAdd');
  Route::post ('cow/v-save', 'CowController@saveCow' );

  Route::get('staff','StaffController@listAll');
  Route::get('staff/add','StaffController@mockAdd');

  Route::get('service/add','ServicesController@add');

  Route::get('v-cows','CowController@vall');

});
