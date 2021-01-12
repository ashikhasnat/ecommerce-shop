<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        return view('home.cart');
    }
    public function totalAmount()
    {
        $totalAmount = DB::table('carts')
            ->join('products', 'carts.product_id', 'products.id')
            ->select('carts.sub_total')
            ->where('carts.user_id', auth()->id())
            ->get()
            ->sum('sub_total');
        return $totalAmount;
    }
    public function apiIndex()
    {
        $cartsProduct = DB::table('carts')
            ->join('products', 'carts.product_id', 'products.id')
            ->select('products.*', 'carts.*')
            ->where('carts.user_id', auth()->id())
            ->get();

        return $cartsProduct;
    }
    public function apiStore()
    {
        $newCartItem = request()->validate([
            'product_id' => [''],
            'quantity' => ['numeric', 'max:20'],
        ]);
        if (request('price')) {
            $sub_total = request('price') * request('quantity') ?? 1;
        }
        Cart::create([
            'product_id' => $newCartItem['product_id'],
            'user_id' => auth()->id(),
            'quantity' => $newCartItem['quantity'],
            'sub_total' => $sub_total,
        ]);
        return $newCartItem;
    }
    public function apiUpdate($id)
    {
        $updateCartItem = request()->validate([
            'product_id' => [''],
            'quantity' => ['numeric'],
        ]);
        if (request('price') || request('quantity')) {
            $sub_total = request('price') * request('quantity');
        }
        $cart = Cart::find($id);
        $cart->update([
            'quantity' => $updateCartItem['quantity'],
            'sub_total' => $sub_total,
        ]);
        return $updateCartItem;
    }
    public function apiDestroy($id)
    {
        $cartItem = Cart::findOrFail($id);
        return $cartItem->delete();
    }
}
