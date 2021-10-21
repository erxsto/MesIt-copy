<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VibracionController;
use App\Mail\AlertaVibracionMailable;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\LoginController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
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

Route::name('login')->get('login/', 'App\Http\Controllers\LoginController@login');
Route::name('store')->post('store/', 'App\Http\Controllers\LoginController@store');
Route::name('destroy')->get('destroy/', 'App\Http\Controllers\LoginController@destroy');


//RUTAS Graficas Energia.

//Ruta correo
Route::get('alertavibracion', function () {
    $correo = new AlertaVibracionMailable;
    Mail::to('amats@gmail.com')->send($correo);
    return "Mensaje enviado.";
});

Route::group(['middleware' => ['customAuth']], function () {
    Route::name('/')->get('/', 'App\Http\Controllers\DashboardController@index');
    Route::name('vibracion')->get('vibracion/', 'App\Http\Controllers\VibracionController@index');
    Route::name('temperatura')->get('temperatura/', 'App\Http\Controllers\TemperaturaController@index');
    Route::name('temperatura')->get('temperatura/', 'App\Http\Controllers\TemperaturaController@fecha');
    Route::name('energia')->get('energia/', 'App\Http\Controllers\EnergiaController@index');
    Route::name('descargarPDFv')->get('pdfv/', 'App\Http\Controllers\PDFController@PDFv');
    Route::name('descargarPDFt')->get('pdft/', 'App\Http\Controllers\PDFController@PDFt');
    Route::name('descargarPDFe')->get('pdfe/', 'App\Http\Controllers\PDFController@PDFe');
    Route::name('descargarPDFef')->get('pdfef/', 'App\Http\Controllers\PDFController@PDFef');
    Route::name('descargarPDFev')->get('pdfev/', 'App\Http\Controllers\PDFController@PDFev');
    Route::name('descargarPDFep')->get('pdfep/', 'App\Http\Controllers\PDFController@PDFep');
    Route::name('descargarPDFefe')->get('pdfefe/', 'App\Http\Controllers\PDFController@PDFefe');
    Route::name('gfases')->get('gfases/', 'App\Http\Controllers\EnergiaController@gfases');
    Route::name('gvolts')->get('gvolts/', 'App\Http\Controllers\EnergiaController@gvolts');
    Route::name('gpotencias')->get('gpotencias/', 'App\Http\Controllers\EnergiaController@gpotencias');
    Route::name('gfye')->get('gfye/', 'App\Http\Controllers\EnergiaController@gfye');
});


Route::post('temperatura/save', 'App\Http\Controllers\TemperaturaController@registrar')->name('save');
