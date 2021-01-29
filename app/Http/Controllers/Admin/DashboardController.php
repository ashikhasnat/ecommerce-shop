<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(
        User $user,
        Product $product,
        Order $order,
        Review $review
    ) {
        $products = $product->all()->count();
        $orders = $order->all()->count();
        $users = $user->all()->count();
        $reviews = $review
            ->where('ratings', 5)
            ->get()
            ->count();
        // dd($reviews);
        return view(
            'dashboard.index',
            compact('products', 'orders', 'users', 'reviews')
        );
    }
}
