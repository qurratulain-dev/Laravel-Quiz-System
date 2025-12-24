<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\admin;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        admin::create([
            'name' => 'Admin',
            'email' => 'dev.quratulain@gmail.com',
            'password' => 12345,
            'role' => 'admin',
        ]);
    }
}
