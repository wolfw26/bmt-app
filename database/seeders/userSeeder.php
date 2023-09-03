<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'superadmin',
            'role' => 'admin',
            'email' => 'admin@super.com',
            'password' => Hash::make('superadmin1526')
        ]);



        \App\Models\User::create([
            'name' => 'peserta1',
            'role' => 'peserta',
            'email' => 'peserta1@gmail.com',
            'password' => Hash::make('peserta1')
        ]);
        \App\Models\User::create([
            'name' => 'peserta2',
            'role' => 'peserta',
            'email' => 'peserta2@gmail.com',
            'password' => Hash::make('peserta2')
        ]);
    }
}
