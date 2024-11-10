<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'email' => 'admin@gmail.com',
            'username' => 'Admin',
            'password' => bcrypt('admin'),
            'role' => 'Admin',
        ]);
        DB::table('users')->insert([
            'email' => 'pegawai@gmail.com',
            'username' => 'Pegawai',
            'password' => bcrypt('pegawai'),
            'role' => 'Pegawai',
        ]);
        DB::table('users')->insert([
            'email' => 'pencaker@gmail.com',
            'username' => 'Bass',
            'password' => bcrypt('pencaker'),
            'role' => 'Pencaker',
        ]);
    }
}
