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
/////////////////////Dashboard
    Route::get('/Dashboard','adminController@index');
    /////////register student
    Route::resource('/Student', 'StudentController');
    /////////// Teachers
    Route::resource('/Teacher', 'TeacherController');




/////admin login
Route::get('loginPage','adminController@indexLogin');
Route::post('loginPage','adminController@login')->name('login');
