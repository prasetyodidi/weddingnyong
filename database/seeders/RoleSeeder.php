<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'id' => 0,
            'role' => 'user'
        ]);
        Role::create([
            'id' => 1,
            'role' => 'admin'
        ]);
    }
}
