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

Route::get('/', 'HomeController@index')->name('dashboard');

Route::get('/linkedin', 'LinkedinController@index')->name('linkedin');
Route::post('/linkedin/submit', 'LinkedinController@submit')->name('linkedin.submit');
Route::post('/absency/submit', 'AbsencyController@submit')->name('absency.submit');

