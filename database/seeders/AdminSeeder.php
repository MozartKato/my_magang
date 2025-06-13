<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => 101,
            'name' => 'Admin',
            'email' => 'admin@admin',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        Admin::create([
            'user_id' => 101,
            'phone' => '080808',
            'address' => 'Jalan jalan',
        ]);
    }
}
