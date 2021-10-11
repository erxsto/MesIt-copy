<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VibracionController;

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

Route::name('/')->get('/', 'App\Http\Controllers\DashboardController@index');
Route::name('vibracion')->get('vibracion/', 'App\Http\Controllers\VibracionController@index');
Route::name('temperatura')->get('temperatura/', 'App\Http\Controllers\TemperaturaController@index');
Route::name('energia')->get('energia/', 'App\Http\Controllers\EnergiaController@index');
Route::name('descargarPDF')->get('pdf/', 'App\Http\Controllers\PDFController@PDF');
