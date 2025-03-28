<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Route;

// Route::set404(function() {
//     header('HTTP/1.1 404 Not Found');// đổi status code 
//     return view('error.404');
// });

Route::get('/', function(){
    return view('welcome');
});


Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::prefix('products')->name('product.')->group(function(){
        Route::get('/', [ProductController::class, 'index'])->name('list');
        Route::get('/{id}/show', [ProductController::class, 'show'])->name('show');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [ProductController::class, 'update'])->name('update');
        Route::prefix('trashs')->name('trash.')->group(function(){
            Route::get('/', [ProductController::class, 'trash'])->name('list');
            Route::post('/{id}/restore', [ProductController::class, 'restore'])->name('restore');
            Route::delete('/{id}/forceDelete', [ProductController::class, 'forceDelete'])->name('forceDelete');
        });
        Route::delete('/{id}/destroy', [ProductController::class, 'destroy'])->name('destroy');
    });

    // banner
    Route::prefix('banners')->name('banner.')->group(function(){
        Route::get('/', [BannerController::class, 'index'])->name('list');
        Route::get('/{id}/show', [BannerController::class, 'show'])->name('show');
        Route::get('/create', [BannerController::class, 'create'])->name('create');
        Route::post('/store', [BannerController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [BannerController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [BannerController::class, 'update'])->name('update');
        Route::prefix('trashs')->name('trash.')->group(function(){
            Route::get('/', [BannerController::class, 'trash'])->name('list');
            Route::post('/{id}/restore', [BannerController::class, 'restore'])->name('restore');
            Route::delete('/{id}/forceDelete', [BannerController::class, 'forceDelete'])->name('forceDelete');
        });
        Route::delete('/{id}/destroy', [BannerController::class, 'destroy'])->name('destroy');
    });

    //contact
    Route::prefix('contacts')->name('contact.')->group(function(){
        Route::get('/', [ContactController::class, 'index'])->name('list');
        Route::get('/{id}/show', [ContactController::class, 'show'])->name('show');
        Route::get('/create', [ContactController::class, 'create'])->name('create');
        Route::post('/store', [ContactController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ContactController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [ContactController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [ContactController::class, 'destroy'])->name('destroy');
        Route::prefix('trashs')->name('trash.')->group(function(){
            Route::get('/', [ContactController::class, 'trash'])->name('list');
            Route::post('/{id}/restore', [ContactController::class, 'restore'])->name('restore');
            Route::delete('/{id}/forceDelete', [ContactController::class, 'forceDelete'])->name('forceDelete');
        });
    });

    //customer
    Route::prefix('customers')->name('customer.')->group(function(){
        Route::get('/', [CustomerController::class, 'index'])->name('list');
        Route::get('/{id}/show', [CustomerController::class, 'show'])->name('show');
        Route::get('/create', [CustomerController::class, 'create'])->name('create');
        Route::post('/store', [CustomerController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [CustomerController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [CustomerController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [CustomerController::class, 'destroy'])->name('destroy');
        Route::prefix('trashs')->name('trash.')->group(function(){
            Route::get('/', [CustomerController::class, 'trash'])->name('list');
            Route::post('/{id}/restore', [CustomerController::class, 'restore'])->name('restore');
            Route::delete('/{id}/forceDelete', [CustomerController::class, 'forceDelete'])->name('forceDelete');
        });
    });

    //post
    Route::prefix('posts')->name('post.')->group(function(){
        Route::get('/', [PostController::class, 'index'])->name('list');
        Route::get('/{id}/show', [PostController::class, 'show'])->name('show');
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/store', [PostController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PostController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [PostController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [PostController::class, 'destroy'])->name('destroy');
        Route::prefix('trashs')->name('trash.')->group(function(){
            Route::get('/', [PostController::class, 'trash'])->name('list');
            Route::post('/{id}/restore', [PostController::class, 'restore'])->name('restore');
            Route::delete('/{id}/forceDelete', [PostController::class, 'forceDelete'])->name('forceDelete');
        });
    });

    //review
    Route::prefix('reviews')->name('review.')->group(function(){
        Route::get('/', [ReviewController::class, 'index'])->name('list');
        Route::get('/{id}/show', [ReviewController::class, 'show'])->name('show');
        Route::get('/create', [ReviewController::class, 'create'])->name('create');
        Route::post('/store', [ReviewController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ReviewController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [ReviewController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [ReviewController::class, 'destroy'])->name('destroy');
        Route::prefix('trashs')->name('trash.')->group(function(){
            Route::get('/', [ReviewController::class, 'trash'])->name('list');
            Route::post('/{id}/restore', [ReviewController::class, 'restore'])->name('restore');
            Route::delete('/{id}/forceDelete', [ReviewController::class, 'forceDelete'])->name('forceDelete');
        });
    });
});
