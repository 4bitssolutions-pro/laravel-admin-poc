<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
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
Route::get('/login','App\Http\Controllers\Auth\AuthController@loginview')->name('login');
Route::get('/register','App\Http\Controllers\Auth\AuthController@registerview')->name('register');
Route::post('/register','App\Http\Controllers\Auth\AuthController@register')->name('register');
Route::post('/login','App\Http\Controllers\Auth\AuthController@login');


Route::middleware('auth')->group(function(){

    Route::get('/', function () {
        return view('welcome');
    });
});

