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
        return [
            'sku' => Str::upper(Str::random(3)) . '-' . rand(0, 4000),
            'title' => $this->faker->sentence(2),
            'slug' => Str::slug($this->faker->sentence(2)),
            'price' => $this->faker->numberBetween(10, 1000),
            'thumbnail' => $this->faker->imageUrl(1920, 1080),
            'thumbnail' =>
                'https://picsum.photos/1920/1080?random=' . rand(1, 50),
            'brand_id' => rand(1, 5),
            'category_id' => rand(1, 10),
            'sub_category_id' => rand(1, 5),
            'stock_status' => rand(0, 1),
            'short_details' => $this->faker->sentence(20),
            'long_details' => $this->faker->sentence(100),
        ];
    }
}
