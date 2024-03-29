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

Route::get('/order-track', function () {
    return view('order-track');
});

Route::get('/feed', function () {
    return view('feed');
});

Route::get('/adminlte-timeline', function () {
    return view('adminlte-timeline');
});
