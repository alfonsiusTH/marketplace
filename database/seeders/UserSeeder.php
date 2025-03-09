<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name'       => 'Admin',
                'email'      => 'admin@example.com',
                'password'   => Hash::make('admin123'), // password yang di-hash
                'telephone'  => '081234567890',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ],
            [
                'name'       => 'User Satu',
                'email'      => 'user1@example.com',
                'password'   => Hash::make('user123'), // password yang di-hash
                'telephone'  => '081298765432',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ]
        ]);
    }
}
