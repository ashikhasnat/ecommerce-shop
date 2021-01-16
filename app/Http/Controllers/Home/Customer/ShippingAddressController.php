<?php

namespace App\Http\Controllers\Home\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer\Country;
use App\Models\Customer\ShippingAddress;
use Illuminate\Http\Request;

class ShippingAddressController extends Controller
{
    public function create()
    {
        $countries = Country::all(['country_name', 'id']);
        return view('home.account.shipping.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $address = request()->validate([
            'first_name' => ['string', 'required', 'min:3', 'max:50'],
            'last_name' => ['string', 'required', 'min:3', 'max:50'],
            'company_name' => ['string', 'min:3', 'max:50'],
            'country_id' => ['string'],
            'street_address' => ['string', 'required', 'min:3', 'max:50'],
            'city' => ['string', 'required', 'min:3', 'max:50'],
            'post_code' => ['string', 'required', 'min:3', 'max:50'],
            'phone' => ['string', 'required', 'min:3', 'max:50'],
            'email' => ['string', 'required', 'min:3', 'max:50', 'email'],
        ]);

        ShippingAddress::create(
            array_merge($address, [
                'user_id' => auth()->id(),
            ])
        );
        return redirect(route('account-address'))->with('msg', 'Saved Address');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShippingAddress  $ShippingAddress
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shippingAddress = ShippingAddress::findOrFail($id);
        $countries = Country::all(['country_name', 'id']);
        return view(
            'home.account.shipping.edit',
            compact('countries', 'shippingAddress')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShippingAddress  $ShippingAddress
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $shippingAddress = ShippingAddress::findOrFail($id);
        $shippingAddress->update(request()->all());
        return redirect(route('my-account'))->with('msg', 'Updated Address');
    }
}
