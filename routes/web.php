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


// Only authenticated users may enter...
Route::get('/', 'HomeController@index')->name('dashboard');
Route::get('/linkedin', 'LinkedinController@index')->name('linkedin');
Route::post('/linkedin/submit', 'LinkedinController@submit')->name('linkedin.submit');
Route::post('/absency/submit', 'AbsencyController@submit')->name('absency.submit');

Route::get('/management/vpoint', 'VPointRequestController@index')->name('management.vpoint');
Route::post('/management/vpoint/submit', 'VPointRequestController@submit')->name('management.vpoint.submit');
Route::POST('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/dailyreport', 'DailyReportController@index')->name('dailyreport');
Route::post('/dailyreport/submit', 'DailyReportController@submit')->name('dailyreport.submit');



