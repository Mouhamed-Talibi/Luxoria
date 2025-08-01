<?php

    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\AppController;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\CategoryController;
    use App\Http\Controllers\ProductController;
    use Illuminate\Support\Facades\Route;

    // home route
    Route::get('/', [AppController::class, 'home'])
        ->name('app.app');

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
        Route::get('/email/verify', [AuthController::class, 'verifyEmail'])
            ->name('verify_email');
        // confirm account route
        Route::get('/confirm_email/{hash}', [AuthController::class, 'confirmEmail'])
            ->name('confirm_email');
        // logout route
        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('logout');
    });

    // app routes
    Route::middleware(['verified', 'auth'])->prefix('app')->name('app.')->group(function(){
        // home route
        Route::get('/home', [AppController::class, 'index'])
            ->name('home');
        // lang switch
        Route::get('/lang/{local}', [AppController::class, 'langSwitch'])
            ->name('lang.switch');
        // show product page
        Route::get('products/{product}', [ProductController::class, 'show'])
            ->name('show_product');
        // show products by category
        Route::get('categories/{category}', [CategoryController::class, 'show'])
            ->name('show_category_products');
    });

    // admin routes
    Route::middleware(['verified', 'auth', 'admin'])->prefix('admin')->name('admin.')->group(function(){
        // dashboard routes
        Route::get('/dashboard', [AdminController::class, 'dashboard'])
            ->name('dashboard');
        // add category route
        Route::get('/categories/add', [AdminController::class, 'addCategory'])
            ->name('add_category');
        // insert category
        Route::post('/categories/store', [AdminController::class, 'storeCategory'])
            ->name('insert_category');
        // categories list
        Route::get('/categories', [CategoryController::class, 'index'])
            ->name('categories');
        // edit category form
        Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])
            ->name('edit_category');
        // update category
        Route::put('/categories/{category}', [CategoryController::class, 'update'])
            ->name('update_category');
        // delete category
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
            ->name('destroy_category');
        // restore category
        Route::get('/categories/{category}/restore', [CategoryController::class, 'restore'])
            ->name('restore_category');
        // create product route
        Route::get('/products/add', [ProductController::class, 'create'])
            ->name('add_product');
        // store product
        Route::post('/products/store', [ProductController::class, 'store'])
            ->name('store_product');
        // products route
        Route::get('/products', [ProductController::class, 'index'])
            ->name('products');
        // edit product form
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
            ->name('edit_product');
        // update product 
        Route::put('/products/{product}', [ProductController::class, 'update'])
            ->name('update_product');
        // delete product
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])
            ->name('destroy_product');
        // restore product
        Route::get('/products/{product}/restore', [ProductController::class, 'restore'])
            ->name('restore_product');
    });