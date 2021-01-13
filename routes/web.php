<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\CategoryController as HomeCategoryController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\ProductController as HomeProductController;
use App\Http\Controllers\Home\ReviewController;
use App\Http\Controllers\Home\SearchController;
use App\Http\Controllers\Home\ShopController;
use App\Http\Controllers\Home\SubCategoryController as HomeSubCategoryController;
use App\Http\Controllers\Home\WishListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', [HomeController::class, 'index']);
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/product', ProductController::class);
    Route::resource('/category', CategoryController::class)->except([
        'show',
        'destroy',
    ]);
    Route::resource('/subcategory', SubCategoryController::class)->except([
        'show',
        'destroy',
    ]);
    Route::resource('/brand', BrandController::class)->except([
        'show',
        'destroy',
    ]);
});

Route::get('/wishlist', [WishListController::class, 'index'])->name('wishlist');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::group(['prefix' => '/api'], function () {
    Route::get('/cart', [CartController::class, 'apiIndex']);
    Route::post('/search', [SearchController::class, 'apiIndex']);
    Route::get('/cart-total-amount', [CartController::class, 'totalAmount']);
    Route::post('/cart/{id}', [CartController::class, 'apiStore']);
    Route::put('/cart/{id}', [CartController::class, 'apiUpdate']);
    Route::get('/wishlist', [WishListController::class, 'apiIndex']);
    Route::post('/wishlist', [WishListController::class, 'apiStore']);
    Route::delete('/cart/{id}', [CartController::class, 'apiDestroy']);
    Route::delete('/wishlist/{id}', [WishListController::class, 'apiDestroy']);
});
Route::group(['prefix' => 'shop'], function () {
    Route::get('/', [ShopController::class, 'index'])->name('shop.index');
    Route::get('/{product:slug}', [HomeProductController::class, 'show'])->name(
        'home-product.show'
    );
    Route::post('review/{product:id}', [
        ReviewController::class,
        'store',
    ])->name('review.store');
    Route::get('/category', function () {
        return redirect('/shop');
    });
    Route::get('/category/{category:slug}', [
        HomeCategoryController::class,
        'show',
    ])->name('home-category.show');
    Route::get('/subcategory/{subCategory:slug}', [
        HomeSubCategoryController::class,
        'show',
    ])->name('home-subcategory.show');
});
