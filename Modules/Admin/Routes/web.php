<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\PermissionController;

Route::group(['prefix' => '/admin'], function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('admin.login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])
        ->name('admin.login');

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', [AdminController::class, 'index'])
            ->name('admin.dashboard');
    });
});

Route::resource('/permissions', PermissionController::class);
