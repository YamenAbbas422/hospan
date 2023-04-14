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
        User::firstOrCreate(
            [
                'phone' => "+96655307533"
            ],
            [
                'name' => 'admin',
                'phone' => "+96655307533",
                'password' => Hash::make('123456789'), // password
                'role_id' => '1'
            ]
        );    
    }
}
