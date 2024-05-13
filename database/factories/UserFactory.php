<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class UserFactory extends Factory
{
    
    public function definition()
    {
        return [
            'number_id' => $this->faker->randomNumber(9,true),
            'name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '123456789', // password
            'remember_token' => Str::random(10),
        ];
    }

}
