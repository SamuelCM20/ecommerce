<?php

namespace Database\Factories;

use App\Models\File;
use App\Models\User;
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
    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            $user->assignRole('user');
            $file = new File(['route' => '/storage/images/users/default.png']);
            $user->file()->save($file);
        });
    }

}
