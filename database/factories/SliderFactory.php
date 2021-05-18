<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Slider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(2),
            'brand_id' => rand(1, 10),
            'category_id' => rand(1, 10),
            'thumbnail' => $this->faker->imageUrl(960, 560),
            'custom_product_link' => $this->faker->sentence(2)
        ];
    }
}
