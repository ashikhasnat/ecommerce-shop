<?php

use App\Http\Controllers\Admin\ApiProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Home\AccountController;
use App\Http\Controllers\Home\BrandController as HomeBrandController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\CategoryController as HomeCategoryController;
use App\Http\Controllers\Home\CheckoutController;
use App\Http\Controllers\Home\Customer\BillingAddressController;
use App\Http\Controllers\Home\Customer\ShippingAddressController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\OrderController;
use App\Http\Controllers\Home\ProductController as HomeProductController;
use App\Http\Controllers\Home\SubCategoryController as HomeSubCategoryController;
use App\Http\Controllers\Home\ReviewController;
use App\Http\Controllers\Home\SearchController;
use App\Http\Controllers\Home\ShopController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\WishListController;
use App\Http\Controllers\Home\SslCommerzPaymentController;
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
// dashboard section
Route::group(
    ['prefix' => 'dashboard', 'middleware' => ['role:superadministrator']],
    function () {
        Route::get('/', [DashboardController::class, 'index'])->name(
            'dashboard'
        );
        Route::resource('/product', ProductController::class);
        Route::resource('/slider', SliderController::class);
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
        Route::resource('/coupon', CouponController::class);

        // Contact US

        Route::get('/contact-us', [ContactController::class, 'index'])->name('contact-us.index');
        Route::get('/contact-us/{contact}', [ContactController::class, 'show'])->name('contact-us.show');
        Route::get('/orders', [AdminOrderController::class, 'index'])->name(
            'admin-order.index'
        );
        Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->name(
            'admin-order.show'
        );
    }
);

// Home section

Route::get('/wishlist', [WishListController::class, 'index'])->name('wishlist');
Route::get('/search-result', [SearchController::class, 'index']);
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout.index')
    ->middleware('auth');
Route::get('/order-summary', [OrderController::class, 'index'])
    ->name('order-summary.index')
    ->middleware('auth');

// Contact US

Route::get('/contact-us', [ContactController::class, 'create'])->name('contact-us.create');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact-us.store');

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

// Api Routes
Route::group(['prefix' => '/api'], function () {
    Route::get('/cart', [CartController::class, 'apiIndex']);
    Route::get('/categories', [HomeController::class, 'apiCategories']);
    Route::post('/search', [SearchController::class, 'apiIndex']);
    Route::get('/cart-total-amount', [CartController::class, 'totalAmount']);
    Route::post('/set-session', [CartController::class, 'setCouponSession']);
    Route::delete('/destroy-session', [
        CartController::class,
        'destroyCouponSession',
    ]);
    Route::post('/cart/{id}', [CartController::class, 'apiStore']);
    Route::put('/cart/{id}', [CartController::class, 'apiUpdate']);
    Route::get('/wishlist', [WishListController::class, 'apiIndex']);
    Route::post('/wishlist', [WishListController::class, 'apiStore']);
    Route::get('/checkout', [CheckoutController::class, 'apiIndex'])->name(
        'checkout.apiIndex'
    );
    Route::post('/purchase', [CheckoutController::class, 'purchase'])->name(
        'purchase'
    );
    Route::delete('/cart/{id}', [CartController::class, 'apiDestroy']);
    Route::delete('/clear-cart', [CartController::class, 'apiClearCart']);
    Route::delete('/wishlist/{id}', [WishListController::class, 'apiDestroy']);
});

// Shop Routes
Route::group(['prefix' => 'shop'], function () {
    Route::get('/', [ShopController::class, 'index'])->name('shop.index');
    Route::group(['prefix' => '/my-account'], function () {
        Route::get('/', [AccountController::class, 'info'])->name('my-account');

        // Customer Address Routes
        Route::get('/address', [AccountController::class, 'address'])->name(
            'account-address'
        );
        Route::resource(
            '/address/billing',
            BillingAddressController::class
        )->except(['index', 'show', 'destroy']);
        Route::resource(
            '/address/shipping',
            ShippingAddressController::class
        )->except(['index', 'show', 'destroy']);
        Route::get('/account-details', [
            AccountController::class,
            'account_details',
        ])->name('account-details');

        // account Orders route
        Route::get('/orders', [
            AccountController::class,
            'account_orders',
        ])->name('account_orders');
        Route::get('/orders/{order:id}', [
            AccountController::class,
            'account_orders_details',
        ])->name('account_orders_details');

        // account details route
        Route::patch('/account-details/{id}', [
            AccountController::class,
            'account_details_update',
        ])->name('account-details-update');
        // Route::get('/', [AccountController::class, 'info'])->name('my-account');
    });

    // Brands
    Route::get('/brands', [HomeBrandController::class, 'index'])->name(
        'home-brand.index'
    );
    Route::get('/brands/{brand:slug}', [
        HomeBrandController::class,
        'show',
    ])->name('home-brand.show');

    // Reviews
    Route::post('review/{product:id}', [
        ReviewController::class,
        'store',
    ])->name('review.store');

    // Category
    Route::get('/category', function () {
        return redirect('/shop');
    });
    Route::get('/category/{category:slug}', [
        HomeCategoryController::class,
        'show',
    ])->name('home-category.show');

    // SubCategory
    Route::get('/subcategory/{subCategory:slug}', [
        HomeSubCategoryController::class,
        'show',
    ])->name('home-subcategory.show');

    // Products Slugs
    Route::get('/{product:slug}', [HomeProductController::class, 'show'])->name(
        'home-product.show'
    );
});
