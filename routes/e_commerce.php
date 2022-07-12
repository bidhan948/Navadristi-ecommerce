<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Ecommerce\CheckOutController;
use App\Http\Controllers\package\PackageController;
use Illuminate\Support\Facades\Route;


Route::get('user/register',[AuthController::class,'register'])->name('user.register');
Route::post('user/register',[AuthController::class,'registerSubmit'])->name('user.registerSubmit');
Route::get('package-list',[PackageController::class,'packageList'])->name('package.list');
Route::get('buy-package/{package_detail:token}',[CheckOutController::class,'checkout'])->name('package.checkout');

Route::prefix('admin')->middleware(['Role'])->group(function () {
    // Route for e-commerce
    Route::get('/user', [AuthController::class, 'index'])->name('admin.auth.index');
    Route::get('/user/create', [AuthController::class, 'create'])->name('admin.auth.create');
    Route::get('/package', [PackageController::class, 'index'])->name('admin.package.index');
    Route::post('/package', [PackageController::class, 'store'])->name('admin.package.store');
    Route::put('/package/{package}', [PackageController::class, 'update'])->name('admin.package.update');
    Route::get('/package-detail', [PackageController::class, 'detailIndex'])->name('admin.package_detail.index');
    Route::post('/package-detail', [PackageController::class, 'detailStore'])->name('admin.package_detail.store');
    Route::get('/package-detail/{package_detail}', [PackageController::class, 'detailEdit'])->name('admin.package_detail.edit');
});