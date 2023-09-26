<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '12345678',
        ]);
        $user->givePermissionTo('admin access');

        $user = \App\Models\User::create([
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'password' => '12345678',
        ]);

    }
}