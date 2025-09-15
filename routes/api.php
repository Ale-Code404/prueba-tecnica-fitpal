<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\{
    LoginController,
    RegisterController
};

Route::prefix('auth')->group(function () {
    Route::post('register', RegisterController::class)->name('auth.register');
    Route::post('login', LoginController::class)->name('auth.login');
});
