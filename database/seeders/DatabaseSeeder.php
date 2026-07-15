<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Suppliers;
use App\Models\User;
use Database\Seeders\CategorySeeder;
use Database\Seeders\IdentitySeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Panther',
            'email' => 'panther@correo.com',
            'password' => bcrypt('12345678')
        ]);

        $this->call([
            IdentitySeeder::class,
            CategorySeeder::class,
            WarehouseSeeder::class,
        ]);

        Customer::factory()->count(30)->create();
        Suppliers::factory()->count(30)->create();
        Product::factory()->count(100)->create();
    }
}
