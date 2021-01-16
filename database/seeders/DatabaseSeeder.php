<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Customer\BillingAddress;
use App\Models\Customer\ShippingAddress;
use App\Models\Image;
use App\Models\Product;
use App\Models\Review;
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
        User::factory()->create([
            'email' => 'nafishasnat.nh@gmail.com',
        ]);
        User::factory()->create();
        Product::factory(200)->create();
        Category::factory(10)->create();
        SubCategory::factory(20)->create();
        Brand::factory(10)->create();
        Image::factory(1250)->create();
        Review::factory(500)->create();
        Wishlist::factory(5)->create();
        Cart::factory(5)->create();
        BillingAddress::factory()->create();
        ShippingAddress::factory()->create();
        $this->call(CountrySeeder::class);
    }
}
