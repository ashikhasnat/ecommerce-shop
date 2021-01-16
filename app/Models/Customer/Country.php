<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function billing_address()
    {
        return $this->belongsTo(BillingAddress::class);
    }
    public function shipping_address()
    {
        return $this->belongsTo(ShippingAddress::class);
    }
}
