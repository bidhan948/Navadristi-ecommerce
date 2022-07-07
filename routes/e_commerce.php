<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('user/register',[AuthController::class,'register'])->name('user.register');
Route::post('user/register',[AuthController::class,'registerSubmit'])->name('user.registerSubmit');

Route::prefix('admin')->middleware(['Role'])->group(function () {
    
    // Route for e-commerce
    Route::get('/user', [AuthController::class, 'index'])->name('admin.auth.index');
    Route::get('/user/create', [AuthController::class, 'create'])->name('admin.auth.create');
});