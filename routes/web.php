<?php

    use App\Http\Controllers\AppController;
    use App\Http\Controllers\AuthController;
    use Illuminate\Support\Facades\Route;

    // home route
    Route::get('/', [AppController::class, 'home'])
        ->name('app.home');

    // auth routes
    Route::prefix('auth')->name('auth.')->group(function() {
        // login form route
        route::get('/login', [AuthController::class, 'loginForm'])
            ->name('login_form');
    });
