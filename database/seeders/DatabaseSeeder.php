<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
        ]);
        User::factory(10)->create();
        Product::factory(10)->create();
    }
}
