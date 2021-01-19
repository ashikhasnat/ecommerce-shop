<?php

namespace App\Models;

use App\Models\Customer\BillingAddress;
use App\Models\Customer\ShippingAddress;
use Laravel\Cashier\Billable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = ['name', 'email', 'password'];
    protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function wishlist()
    {
        return $this->hasOne(Wishlist::class);
    }
    public function billing_address()
    {
        return $this->hasOne(BillingAddress::class);
    }
    public function shipping_address()
    {
        return $this->hasOne(ShippingAddress::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
