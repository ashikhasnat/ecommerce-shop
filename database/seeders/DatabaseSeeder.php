<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\CompanyInfo;
use App\Models\Contact;
use App\Models\Customer\BillingAddress;
use App\Models\Customer\ShippingAddress;
use App\Models\Image;
use App\Models\Product;
use App\Models\Review;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        CompanyInfo::factory()->create();
        Category::factory(10)->create();
        Product::factory(200)->create();
        Slider::factory(10)->create();
        SubCategory::factory(20)->create();
        Brand::factory(10)->create();
        Image::factory(1250)->create();
        Review::factory(500)->create();
        Contact::factory(5)->create();
        Wishlist::factory(5)->create();
        Cart::factory(5)->create();
        BillingAddress::factory()->create();
        ShippingAddress::factory()->create();
        $this->call(CountrySeeder::class);
        $this->call(LaratrustSeeder::class);
        $user = User::factory()->create([
            'email' => 'nafishasnat.nh@gmail.com',
        ]);
        $user->attachRole('superadministrator');
        User::factory()->create();
    }
}
