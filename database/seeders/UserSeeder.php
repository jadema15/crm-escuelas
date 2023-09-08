<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@firmafy.com',
            'password' => '$2y$10$zBTSsZD7m0O4JwVx3itbyuXotZle8ShsCYXTUUqF1ua2apUJi0oRe'                  
        ]);
    }
}
