<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'role_id' => 1,
                'password' => Hash::make('123'),
                'npm' => 'D1A200001',
                'is_active' => 1,
                'image' => 'default.jpg',
                // 'telephone' => '',
                // 'address' => '',
                // 'birthday' => '',
                // 'coordinator' => '',
            ],

            [
                'name' => 'bendahara',
                'username' => 'bendahara',
                'email' => 'bendahara@gmail.com',
                'role_id' => 2,
                'password' => Hash::make('123'),
                'npm' => 'D1A200002',
                'is_active' => 1,
                'image' => 'default.jpg',
                // 'telephone' => '',
                // 'address' => '',
                // 'birthday' => '',
                // 'coordinator' => '',
            ],
            [
                'name' => 'sekretaris',
                'username' => 'sekretaris',
                'email' => 'sekretaris@gmail.com',
                'role_id' => 3,
                'password' => Hash::make('123'),
                'npm' => 'D1A200003',
                'is_active' => 1,
                'image' => 'default.jpg',
                // 'telephone' => '',
                // 'address' => '',
                // 'birthday' => '',
                // 'coordinator' => '',
            ],
            [
                'name' => 'member',
                'username' => 'member',
                'email' => 'member@gmail.com',
                'role_id' => 4,
                'password' => Hash::make('123'),
                'npm' => 'D1A200004',
                'is_active' => 0,
                'image' => 'default.jpg',
                // 'telephone' => '',
                // 'address' => '',
                // 'birthday' => '',
                // 'coordinator' => '',
            ],
            [
                'name' => 'dadan',
                'username' => 'dadan',
                'email' => 'dadan@gmail.com',
                'role_id' => 4,
                'password' => Hash::make('123'),
                'npm' => 'D1A200005',
                'is_active' => 1,
                'image' => 'default.jpg',
                // 'telephone' => '',
                // 'address' => '',
                // 'birthday' => '',
                // 'coordinator' => '',
            ],
        ];
        DB::table('users')->insert($data);
    }
}
