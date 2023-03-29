<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\PermissionController;

Route::group(['prefix' => '/admin'], function () {
    Route::get('/', 'AdminController@index');
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('admin.login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])
        ->name('admin.login');
});

Route::resource('/permissions', PermissionController::class);
