<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AccountController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function info()
    {
        return view('home.account.info');
    }
    public function address()
    {
        $billingAddress = DB::table('billing_addresses')
            ->join('countries', 'billing_addresses.country_id', 'countries.id')
            ->select('countries.*', 'billing_addresses.*')
            ->where('billing_addresses.user_id', auth()->id())
            ->get()
            ->first();
        $shippingAddress = DB::table('shipping_addresses')
            ->join('countries', 'shipping_addresses.country_id', 'countries.id')
            ->select('countries.*', 'shipping_addresses.*')
            ->where('shipping_addresses.user_id', auth()->id())
            ->get()
            ->first();
        return view(
            'home.account.addresses',
            compact('billingAddress', 'shippingAddress')
        );
    }
    public function account_orders()
    {
        $orderedProducts = Order::where('user_id', auth()->id())->get();
        return view('home.account.orders', compact('orderedProducts'));
    }
    public function account_orders_details($id)
    {
        $orderedProducts = Order::where('id', $id)
            ->with([
                'products' => function ($query) {
                    $query->get(['title', 'quantity', 'price']);
                },
            ])
            ->first();
        return view('home.account.order-details', compact('orderedProducts'));
    }
    public function account_details()
    {
        return view('home.account.details');
    }
    public function account_details_update($id)
    {
        $user = User::findOrFail($id);
        $user->update(request()->all());
        return redirect(route('my-account'))->with('msg', 'Updated');
    }
}
