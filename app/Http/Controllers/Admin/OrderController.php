<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $billing_address = DB::table('billing_addresses')
            ->join('countries', 'billing_addresses.country_id', 'countries.id')
            ->select('countries.*', 'billing_addresses.*')
            ->where('billing_addresses.user_id', $orderedProducts->user->id)
            ->get()
            ->first();
        // dd($orderedProducts->user->billing_address->first_name);
        return view(
            'dashboard.order.show',
            compact('orderedProducts', 'billing_address')
        );
    }
}
