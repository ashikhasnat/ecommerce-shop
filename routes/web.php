<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Home\CategoryController as HomeCategoryController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\ProductController as HomeProductController;
use App\Http\Controllers\Home\ReviewController;
use App\Http\Controllers\Home\ShopController;
use App\Http\Controllers\Home\SubCategoryController as HomeSubCategoryController;
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

Route::get('/', [HomeController::class, 'index']);
Auth::routes();
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
