<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['role:Super_User']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});
