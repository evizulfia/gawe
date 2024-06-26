<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Test User 1',
                'email' => 'testuser1@example.com',
                'password' => bcrypt('password'),
                'status' => 'active',
                'token' => Str::random(10),
                'role' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Test User 2',
                'email' => 'testuser2@example.com',
                'password' => bcrypt('password'),
                'status' => 'inactive',
                'token' => Str::random(10),
                'role' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
