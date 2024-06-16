<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/productos', ProductoController::class);

Route::get('/home', [LoginController::class, 'showLoginForm'])->name('home');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
