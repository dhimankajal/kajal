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

/* frontend site route start here*/
Route::get('/', function () {
    return view('home');
});
Route::get('/register',['as'=>'register','uses'=>'Auth\RegisterController@registerPage']);
Route::match(['get', 'post'],'/phone_check', 'Auth\RegisterController@phone_check');
Route::match(['get', 'post'],'/email_check', 'Auth\RegisterController@email_check');
Route::match(['get','post'],'/registerData',['as'=>'registerData','uses'=>'Auth\RegisterController@create']);
Route::get('/login',['as'=>'login','uses'=>'Auth\LoginController@loginPage']);
Route::match(['get','post'],'/loginData',['as'=>'loginData','Auth'=>'Auth\LoginController@login'])
Route::match(['get','post'],'/forgotPassword',['as'=>'forgotPassword','Auth'=>'Auth\LoginController@forgotPassword'])
/*frontend site route end here*/