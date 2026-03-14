<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\BlogTagController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\FeaturedProductController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [VerificationController::class , 'index']);
Route::post('/verify', [VerificationController::class , 'verify']);
Route::get('/about', [AboutController::class , 'index'])->name('about');
Route::get('/contact', [ContactController::class , 'index'])->name('contact');
Route::post('/contact', [ContactController::class , 'send'])->name('contact.send');
Route::get('/products', [FeaturedProductController::class , 'index'])->name('products.index');
Route::get('/products/{featuredProduct}', [FeaturedProductController::class , 'show'])->name('products.show');
Route::get('/blog', [BlogController::class , 'index'])->name('blog.index');
Route::get('/blog/category/{slug}', [BlogController::class , 'category'])->name('blog.category');
Route::get('/blog/tag/{slug}', [BlogController::class , 'tag'])->name('blog.tag');
Route::get('/blog/{slug}', [BlogController::class , 'show'])->name('blog.show');

// Legal pages
Route::prefix('legal')->name('legal.')->group(function () {
    Route::get('/privacy', [LegalController::class , 'privacy'])->name('privacy');
    Route::get('/terms', [LegalController::class , 'terms'])->name('terms');
    Route::get('/cookies', [LegalController::class , 'cookies'])->name('cookies');
});

// Authentication routes
Route::get('/login', [AuthController::class , 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class , 'login']);
Route::post('/logout', [AuthController::class , 'logout'])->name('logout');

// Password reset routes
Route::get('/forgot-password', [PasswordResetController::class , 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class , 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [PasswordResetController::class , 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class , 'reset'])->name('password.update');

// Admin dashboard (protected)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
            return view('admin.dashboard');
        }
        )->name('dashboard');

        // Admin management routes
        Route::prefix('admin')->name('admin.')->group(function () {
            Route::resource('products', ProductController::class);
            Route::resource('featured-products', FeaturedProductController::class);

            // Blog management routes
            Route::prefix('blog')->name('blog.')->group(function () {
                    Route::post('/upload-image', [BlogPostController::class , 'uploadImage'])->name('upload-image');
                    Route::resource('posts', BlogPostController::class)->except('show');
                    Route::resource('categories', BlogCategoryController::class)->except(['show', 'create']);
                    Route::resource('tags', BlogTagController::class)->except(['show', 'create']);
                }
                );
            }
            );
        });
