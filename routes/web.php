<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SuperAdmin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;

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
// Auth Routes
Route::get('/login',[AuthController::class,'loginview'])->name('login');
Route::get('/register',[AuthController::class,'registerview'])->name('register');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/',[DashboardController::class,'index'])->middleware('auth.basic');
Route::post('/logout',function(){

})->name('logout');


// Superadmin Routes
Route::prefix('superadmin')->middleware('auth','can:superadmin_access')->group(function(){

Route::resource('/users', UserController::class);

    Route::get('/', function () {
        return view('welcome');
    });
});

