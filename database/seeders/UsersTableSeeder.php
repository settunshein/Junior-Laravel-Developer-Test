<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'name'     => 'Admin User',
                'email'    => 'admin@gmail.com',
                'role'     => 'administrator',
                'phone'    => '09123123123',
                'password' => Hash::make('password'),
                'remark'   => 'superadmin',
            ],[
                'name'     => 'Admin User 2',
                'email'    => 'admin2@gmail.com',
                'role'     => 'administrator',
                'phone'    => '09213213213',
                'password' => Hash::make('password'),
                'remark'   => null,
            ]
        ];

        $managers = [
            [
                'name'     => 'Manager User',
                'email'    => 'manager@gmail.com',
                'role'     => 'manager',
                'phone'    => '09223223223',
                'password' => Hash::make('password'),
            ]
        ];

        $users = [
            [
                'name'     => 'User',
                'email'    => 'user@gmail.com',
                'role'     => "user",
                'phone'    => '09331331331',
                'password' => Hash::make('password'),
            ]
        ];

        User::insert($admins);
        User::insert($managers);
        User::insert($users);
    }
}
