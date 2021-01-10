<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishListController extends Controller
{
    public function index(Wishlist $wishlist)
    {
        $wishlistProduct = DB::table('wishlists')
            ->join('products', 'wishlists.product_id', 'products.id')
            ->select(
                'products.*',
                'wishlists.user_id',
                'wishlists.id',
                'wishlists.product_id'
            )
            ->where('wishlists.user_id', auth()->id())
            ->get();
        // dd($wishlistProduct);
        return view('home.wishlist', compact('wishlistProduct'));
    }
    public function apiIndex(Wishlist $wishlist)
    {
        $wishlistProduct = $wishlist
            ->join('products', 'wishlists.product_id', 'products.id')
            ->select(
                'products.*',
                'wishlists.user_id',
                'wishlists.id',
                'wishlists.product_id'
            )
            ->where('wishlists.user_id', auth()->id())
            ->get();

        return $wishlistProduct;
    }
    public function apiStore()
    {
        $newWishlist = request()->validate([
            'product_id' => [''],
        ]);
        Wishlist::create([
            'product_id' => $newWishlist['product_id'],
            'user_id' => auth()->id(),
        ]);
        return $newWishlist;
    }
    public function apiDestroy($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        return $wishlist->delete();
    }
}