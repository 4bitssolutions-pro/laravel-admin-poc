<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SuperAdmin\UserController;
use App\Http\Controllers\Auth\AuthController;
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
Route::get('/login',[AuthController::class,'loginview'])->name('login');
Route::get('/register',[AuthController::class,'registerview'])->name('register');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::post('/login',[loginview::class,'loginview'])->name('login');


Route::prefix('superadmin')->middleware('auth')->group(function(){
Route::post('/logout',function(){
    \Session::flush();
    return redirect('/');
})->name('logout');
Route::resource('/users', UserController::class);

    Route::get('/', function () {
        return view('welcome');
    });
});

