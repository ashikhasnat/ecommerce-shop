<?php

namespace App\Http\Controllers\Home\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer\BillingAddress;
use App\Models\Customer\Country;
use Illuminate\Http\Request;

class BillingAddressController extends Controller
{
    public function create()
    {
        $countries = Country::all(['country_name', 'id']);
        return view('home.account.billing.create', compact('countries'));
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

        BillingAddress::create(
            array_merge($address, [
                'user_id' => auth()->id(),
            ])
        );
        return redirect(route('account-address'))->with('msg', 'Saved Address');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BillingAddress  $billingAddress
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $billingAddress = BillingAddress::findOrFail($id);
        $countries = Country::all(['country_name', 'id']);
        return view(
            'home.account.billing.edit',
            compact('countries', 'billingAddress')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BillingAddress  $billingAddress
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $billingAddress = BillingAddress::findOrFail($id);
        $billingAddress->update(request()->all());
        return redirect(route('my-account'))->with('msg', 'Updated Address');
    }
}
