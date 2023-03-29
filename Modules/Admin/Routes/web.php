<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\PermissionController;

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index');
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::resource('/permissions', PermissionController::class);
