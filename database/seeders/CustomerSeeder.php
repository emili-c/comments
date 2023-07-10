<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\customer;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        customer::create([
            'name' => 'anita',
            'password' => Hash::make('123456'),
        ]);
        customer::create([
            'name' => 'nandhu',
            'password' => Hash::make('987654'),
        ]);
        customer::create([
            'name' => 'sam',
            'password' => Hash::make('456123'),
        ]);
    }
}
