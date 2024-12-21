<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'username' => 'l_amin',
            'password' => Hash::make('aminamin'),
            'role' => 'lawyer',
        ]);

        DB::table('users')->insert([
            'username' => 't_amin',
            'password' => Hash::make('aminamin'),
            'role' => 'trainee',
        ]);
    }
}
