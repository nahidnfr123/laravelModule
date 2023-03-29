<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\PermissionController;

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index');
});

Route::resource('/permissions', PermissionController::class);
