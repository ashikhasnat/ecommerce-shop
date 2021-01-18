<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishListController extends Controller
{
    public function index()
    {
        // dd($wishlistProduct);
        return view('home.wishlist');
    }
    public function apiIndex(Wishlist $wishlist)
    {
        $wishlistProduct = $wishlist
            ->join('products', 'wishlists.product_id', 'products.id')
            ->select(
                'products.title',
                'products.slug',
                'products.thumbnail',
                'products.price',
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
