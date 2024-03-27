<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role_id' => 1,
            'name' => 'Mutlucan',
            'user_name' =>'admin',
            'email' => 'mtlcnclk98@gmail.com',
            'password' => '$2y$12$OP5LtoO/qEhvfxrZNSW78uElAjObnmifY8FXfbl57Z0k5N2gy1VLe' ,
            'email_verified_at' => now(),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
