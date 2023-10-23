<?php

use Illuminate\Support\Facades\Route;

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
    return view('pages.app.dashboard');
});

Route::get('/login', function () {
    return view('pages.auth.auth-login');
})->name('login');

Route::get('/forgot-password', function () {
    return view('pages.auth.auth-forgot-password');
})->name('forgot-password');

Route::get('/reset-password', function () {
    return view('pages.auth.auth-reset-password');
})->name('reset-password');
