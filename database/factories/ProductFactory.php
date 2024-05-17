<?php

namespace Database\Factories;

use App\Models\File;
use App\Models\Product;
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

    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            $file = new File(['route' => '/storage/images/products/default.png']);
            $product->file()->save($file);
        });
    }
}
