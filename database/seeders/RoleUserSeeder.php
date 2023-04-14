<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::firstOrCreate(['name' => 'admin'], ['name' => 'admin', 'role_id' => 1]);
        Role::firstOrCreate(['name' => 'agent'], ['name' => 'agent', 'role_id' => 2]);

    }
}
