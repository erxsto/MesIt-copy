<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('datadashboard', 'App\Http\Controllers\DashboardController@datadashboard')->name('datadashboard');
Route::get('datavibracion', 'App\Http\Controllers\VibracionController@datavibracion')->name('datavibracion');
Route::get('dataalertx', 'App\Http\Controllers\VibracionController@dataalertx')->name('dataalertx');
Route::get('dataalerty', 'App\Http\Controllers\VibracionController@dataalerty')->name('dataalerty');
Route::get('dataalertz', 'App\Http\Controllers\VibracionController@dataalertz')->name('dataalertz');
Route::get('datatemp', 'App\Http\Controllers\TemperaturaController@datatemp')->name('datatemp');
Route::get('datacharttemp', 'App\Http\Controllers\TemperaturaController@datacharttemp')->name('datacharttemp');
Route::get('dataenergia', 'App\Http\Controllers\EnergiaController@dataenergia')->name('dataenergia');
Route::get('dataenergiam', 'App\Http\Controllers\ModuloController@dataenergiam')->name('dataenergiam');
Route::get('d', 'App\Http\Controllers\TemperaturaController@d')->name('d');

Route::get('alertashow', 'App\Http\Controllers\AlertasController@alertashow')->name('alertashow');

// ----------------- MODULO CONTROL ----------

Route::post('updateizq', 'App\Http\Controllers\ModuloController@updateizq')->name('updateizq');
Route::post('updateder', 'App\Http\Controllers\ModuloController@updateder')->name('updateder');
Route::post('updatestop', 'App\Http\Controllers\ModuloController@updatestop')->name('updatestop');
Route::post('updatereset', 'App\Http\Controllers\ModuloController@updatereset')->name('updatereset');
Route::post('updatebtn', 'App\Http\Controllers\ModuloController@updatebtn')->name('updatebtn');


Route::post('valueslider', 'App\Http\Controllers\ModuloController@valueslider')->name('valueslider');
//Graficas energia
Route::get('grafs', 'App\Http\Controllers\EnergiaController@grafs')->name('grafs');
Route::get('ok','App\Http\Controllers\TelegramController@ok')->name('ok');
