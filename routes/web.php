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
    return view('Dashboard');
});
Route::get('/Agriculture', function () {
    return view('Algriculture2');
});
Route::get('/Agriculture2', function () {
    return view('Algriculture2');
});
Route::get('/AidAgencies', function () {
    return view('AidAgencies');
});
Route::get('/Contact', function () {
    return view('Contact');
});
Route::get('/Dashboard', function () {
    return view('Dashboard');
});
Route::get('/Index', function () {
    return view('Index');
});

