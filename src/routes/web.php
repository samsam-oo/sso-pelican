<?php

use Illuminate\Support\Facades\Route;
use Mcraft\Sso\Http\Controllers\SsoController;

Route::middleware(['web'])->group(function () {
    Route::get('/sso-mcraft', [SsoController::class, 'webhook']);
    Route::get('/sso-mcraft/{token}', [SsoController::class, 'handle'])->name('sso-mcraft.login');
});
