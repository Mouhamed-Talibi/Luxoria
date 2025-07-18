<?php

    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\AppController;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\CategoryController;
    use Illuminate\Support\Facades\Route;

    // home route
    Route::get('/', [AppController::class, 'home'])
        ->name('app.home');

    // auth routes
    Route::prefix('auth')->name('auth.')->group(function() {
        // login form route
        Route::get('/login', [AuthController::class, 'loginForm'])
            ->name('login_form');
        // login route
        Route::post('/login', [AuthController::class, 'login'])
            ->name('login');
        // signup form route
        Route::get('/signup', [AuthController::class, 'signupForm'])
            ->name('signup_form');
        // signup route
        Route::post('/signup', [AuthController::class, 'signup'])
            ->name('signup');
        // verify email route
        Route::get('/verify_email', [AuthController::class, 'verifyEmail'])
            ->name('verify_email');
        // confirm account route
        Route::get('/confirm_email/{hash}', [AuthController::class, 'confirmEmail'])
            ->name('confirm_email');
    });

    // app routes
    Route::middleware(['verified', 'auth'])->prefix('app')->name('app.')->group(function(){
        // home route
        Route::get('/home', [AppController::class, 'index'])
            ->name('home');
    });

    // admin routes
    Route::middleware(['verified', 'auth', 'admin'])->prefix('admin')->name('admin.')->group(function(){
        // dashboard routes
        Route::get('/dashboard', [AdminController::class, 'dashboard'])
            ->name('dashboard');
        // add category route
        Route::get('/add_category', [AdminController::class, 'addCategory'])
            ->name('add_category');
        // insert category
        Route::post('/insert_category', [AdminController::class, 'storeCategory'])
            ->name('insert_category');
        // categories list
        Route::get('/categories', [CategoryController::class, 'index'])
            ->name('categories');
    });