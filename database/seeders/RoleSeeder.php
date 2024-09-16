<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(['id' => 1, 'name' => 'user', 'email' => 'user@gmail.com', 'password' => bcrypt('user123'), 'role_id' => 1]);
        User::create(['id' => 2, 'name' => 'admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('admin123'), 'role_id' => 2]);
        Role::create(['id' => 1, 'name' => 'pengguna']);
        Role::create(['id' => 2, 'name' => 'admin']);
    }
}
