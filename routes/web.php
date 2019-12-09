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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/saludar', 'Controller@saludar');

/*
Route::get('saludar/{nombre}', function ($nombre) {
    return "Hola $nombre";
});
*/
Route::get('saludar/{nombre}/{edad?}', 'Controller@saludarPersona')->name('saludar.persona');

// acertar un número
Route::get('acertarNumero/{numeroUsuario}', 'Controller@generaNumero');
