<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customAuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[customAuthController::class,'login']);
Route::get('/registration',[customAuthController::class,'registration']);
Route::post('/register-user', [customAuthController::class,'registerUser'])->name('register-user');
Route::post('/login-user', [customAuthController::class,'loginUser'])->name('login-user');

Route::get('/dashboard',[customAuthController::class,'dashboard']);
Route::get('/logout',[customAuthController::class,'logout']);
