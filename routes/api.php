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
Route::get('dataalertv', 'App\Http\Controllers\VibracionController@dataalertv')->name('dataalertv');
Route::get('datatemp', 'App\Http\Controllers\TemperaturaController@datatemp')->name('datatemp');
Route::get('datacharttemp', 'App\Http\Controllers\TemperaturaController@datacharttemp')->name('datacharttemp');
Route::get('dataenergia', 'App\Http\Controllers\EnergiaController@dataenergia')->name('dataenergia');
