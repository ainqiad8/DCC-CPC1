<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(8000)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'roles' => 'admin',
        //     'password' =>Hash::make('admin')
        // ]);
          \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'roles' => 'user',
            'password' =>Hash::make('user')
        ]);
    }
}