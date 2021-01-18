<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $userOrder = Order::where('user_id', auth()->id())
            ->latest()
            ->first();
        $orderedProducts = DB::table('order_product')
            ->join('products', 'order_product.product_id', 'products.id')
            ->join('orders', 'order_product.order_id', 'orders.id')
            ->select(
                'products.title',
                'products.price',
                'orders.id',
                'orders.created_at',
                'order_product.quantity'
            )
            ->where('orders.user_id', auth()->id())
            ->where('orders.id', $userOrder->id)
            ->get();
        // dd($orderedProducts);
        // dd($userOrder);
        return view('home.order', compact('orderedProducts', 'userOrder'));
    }
}
