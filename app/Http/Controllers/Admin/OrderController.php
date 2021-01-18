<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $allOrders = Order::latest()->paginate();
        // dd($allOrders);
        return view('dashboard.order.index', compact('allOrders'));
    }
    public function show($id)
    {
        $orderedProducts = Order::where('id', $id)
            ->with([
                'products' => function ($query) {
                    $query->get(['title', 'quantity', 'price']);
                },
            ])
            ->first();
        // dd($orderedProducts);
        return view('dashboard.order.show', compact('orderedProducts'));
    }
}
