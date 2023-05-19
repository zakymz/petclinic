<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        User::create([
            'name'  => 'Goku',
            'email' => 'goku@gmail.com',
            'password' => Hash::make('12345678'),
            'role'      => 'admin'
        ]);

        // user
        // User::create([
        //     'name'  => 'Muten Roshi',
        //     'email' => 'roshi@gmail.com',
        //     'password'  => Hash::make('12345678'),
        //     'role'      => 'user',
        // ]);
    }
}
