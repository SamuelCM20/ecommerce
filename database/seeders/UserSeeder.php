<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    public function run()
    {
        $user = new User([
            'number_id' => "187234566",
            'name' => "Samuel",
            'last_name' => "Caldon",
            'phone' => "123456789",
            'address' => "cra 1 con 12-21 ",
            'email' => "samuel@gmail.com",
            'password' => 'samuel123',
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole('admin');
        $user->save();
    }
}
