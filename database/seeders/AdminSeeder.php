<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\admins;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        admins::create([
            'name' => 'kevin',
            'password' => Hash::make('123456'),
        ]);
        admins::create([
            'name' => 'john',
            'password' => Hash::make('456789'),
        ]);
        admins::create([
            'name' => 'jack',
            'password' => Hash::make('789456'),
        ]);
    }
}
