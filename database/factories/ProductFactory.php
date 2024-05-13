<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
   
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'details' => $this->faker->text(15),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'shipping_cost' => $this->faker->randomFloat(2, 0, 1000),
            'description' => $this->faker->text(100),
            'stock' => $this->faker->numberBetween(1, 100),
            'category_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
