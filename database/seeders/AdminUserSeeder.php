<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Mohamed Salah',
            'email' => 'mohamed_sala712@yahoo.com',
            'password' => Hash::make('123456789'),
            'role' => 'super_admin', 
        ]);
    }
}
