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

Route::get('/', 'HomeController@index')->name('layouts.master');

Route::get('/', function () {
    return view('layouts.master');
});

Auth::routes();

Route::get('/clientes/clientes', function () {
    return view('layouts.master');
});

Route::get('/administracion/companias', function () {
    return view('layouts.master');
});

Route::get('/administracion/companias/create', function () {
    return view('layouts.master');
});

Route::get('/administracion/companias/{compania}/edit', function () {
    return view('layouts.master');
});

Route::get('/administracion/organizadores', function () {
    return view('layouts.master');
});

Route::get('/administracion/productores', function () {
    return view('layouts.master');
});

Route::get('/polizas/automotor', function () {
    return view('layouts.master');
});

Route::get('/polizas/create', function () {
    return view('layouts.master');
});

Route::get('/polizas/automotor/{numero_solicitud}/edit', function () {
    return view('layouts.master');
});

Route::get('{path}', "HomeController@index")->where('path', '([A-z\d-\/_.]+)?');
