<?php

use Illuminate\Support\Facades\Route;
use Webkul\Google\Http\Controllers\Admin\GoogleController;

Route::group(['middleware' => ['web', 'admin'], 'prefix' => 'admin/google'], function () {
    Route::controller(GoogleController::class)->group(function () {
        Route::get('', 'index')->name('admin.google.index');
    });
});