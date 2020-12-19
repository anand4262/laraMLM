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

Route::prefix('admin')->group(function () {
        Route::get('', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
        Route::post('', 'Admin\Auth\LoginController@login');
        Route::post('/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
    Route::group(['middleware' => 'auth:admin'], function(){
        Route::get('/dashboard', 'Admin\AdminController@index')->name('admin.home');
       
    });
});



