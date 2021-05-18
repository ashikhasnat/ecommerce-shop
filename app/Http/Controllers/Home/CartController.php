<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(Request $request)
    {
        // $totalAmount = DB::table('carts')
        //     ->join('products', 'carts.product_id', 'products.id')
        //     ->select('carts.sub_total')
        //     ->where('carts.user_id', auth()->id())
        //     ->get()
        //     ->sum('sub_total');
        // if ($request->session()->has('coupon_code')) {
        //     $code = $request->session()->get('coupon_code');
        //     $discount = $code->discount / 100;
        //     $discountTotal = $totalAmount - $totalAmount * $discount;
        //     dd($discountTotal);

        //     return $discountTotal;
        // } else {
        //     return $totalAmount;
        // }
        return view('home.cart');
    }
    public function setCouponSession(Request $request)
    {
        $code = request('coupon_code');
        if ($code) {
            $coupon = Coupon::where(
                'coupon_code',
                'LIKE',
                "%{$code}%"
            )->first();
            if ($coupon) {
                $request->session()->put('coupon_code', $coupon);
                return response('Coupon Added');
            } else {
                return response('Wrong Coupon', 500);
            }
        }
    }
    public function destroyCouponSession(Request $request)
    {
        $request->session()->forget('coupon_code');
        return response('Removed Coupon');
    }
    public function totalAmount(Request $request)
    {
        $totalAmount = DB::table('carts')
            ->join('products', 'carts.product_id', 'products.id')
            ->select('carts.sub_total')
            ->where('carts.user_id', auth()->id())
            ->get()
            ->sum('sub_total');
        if ($request->session()->has('coupon_code')) {
            $code = $request->session()->get('coupon_code');
            $discount = $code->discount / 100;
            $discountTotal = $totalAmount - $totalAmount * $discount;
            return $discountTotal;
        }
        if (!$request->session()->has('coupon_code')) {
            return $totalAmount;
        }
    }
    public function apiIndex()
    {
        $cartsProduct = DB::table('carts')
            ->join('products', 'carts.product_id', 'products.id')
            ->select(
                'products.id',
                'products.title',
                'products.slug',
                'products.thumbnail',
                'products.price',
                'carts.*'
            )
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
    public function apiClearCart()
    {
        return Cart::where('user_id', auth()->id())->delete();
    }
}
