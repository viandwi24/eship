<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'username' => 'admin',
            'name' => 'Contoh User Admin',
            'password' => Hash::make('admin'),
            'role' => 'Admin'
        ]);
        User::create([
            'username' => 'petugas',
            'name' => 'Contoh User Petugas',
            'password' => Hash::make('petugas'),
            'role' => 'Petugas'
        ]);
        User::create([
            'username' => 'supervisor',
            'name' => 'Contoh User supervisor',
            'password' => Hash::make('supervisor'),
            'role' => 'Supervisor'
        ]);
    }
}
