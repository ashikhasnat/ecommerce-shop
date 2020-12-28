<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
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
        Product::factory(10)->create();
        Category::factory(5)->create();
        SubCategory::factory(10)->create();
        Brand::factory(5)->create();
    }
}
