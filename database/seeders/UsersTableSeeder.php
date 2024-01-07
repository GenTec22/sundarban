<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'f_name' => 'Firoz',
            'l_name' => 'Ahmed',
            'image' => 'user.jpg',
            'email' => 'ferozakas@gmail.com',
            'password' => Hash::make('@Happy10223'),
        ]);
    }
}
