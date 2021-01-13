<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(2);
        return [
            'sku' => Str::upper(Str::random(3)) . '-' . rand(0, 4000),
            'title' => $title,
            'slug' => Str::slug($title),
            'price' => $this->faker->numberBetween(100, 2000) . '.00',
            'thumbnail' => $this->faker->imageUrl(1920, 1080),
            // 'thumbnail' =>
            //     'https://picsum.photos/1920/1080?random=' . rand(1, 50),
            'brand_id' => rand(1, 10),
            'category_id' => rand(1, 10),
            'sub_category_id' => rand(1, 20),
            'stock_status' => rand(0, 1),
            'top_rated' => rand(0, 1),
            'best_seller' => rand(0, 1),
            'weekly_deal' => rand(0, 1),
            'short_details' => $this->faker->sentence(40),
            'long_details' => $this->faker->sentence(300),
        ];
    }
}
