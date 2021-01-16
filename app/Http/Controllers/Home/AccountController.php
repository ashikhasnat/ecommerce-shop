<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Customer\BillingAddress;
use App\Models\Customer\Country;
use App\Models\Customer\ShippingAddress;
use App\Models\User;
use Illuminate\Http\Request;

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
        $billingAddress = BillingAddress::where(
            'user_id',
            auth()->id()
        )->first();
        if ($billingAddress) {
            $billingCountry = Country::where('id', $billingAddress->country_id)
                ->get('country_name')
                ->first();
        } else {
            $billingCountry = '';
        }

        $shippingAddress = ShippingAddress::where(
            'user_id',
            auth()->id()
        )->first();
        if ($shippingAddress) {
            $shippingCountry = Country::where(
                'id',
                $shippingAddress->country_id
            )
                ->get('country_name')
                ->first();
        } else {
            $shippingCountry = '';
        }
        return view(
            'home.account.addresses',
            compact(
                'billingAddress',
                'billingCountry',
                'shippingAddress',
                'shippingCountry'
            )
        );
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
