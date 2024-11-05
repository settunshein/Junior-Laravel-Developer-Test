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
                'name'       => 'Admin User',
                'email'      => 'admin@gmail.com',
                'role'       => 'administrator',
                'phone'      => '09123123123',
                'password'   => Hash::make('password'),
                'remark'     => 'superadmin',
                'company_id' => fake()->numberBetween(1, 5),
                'created_at' => now(),
            ],[
                'name'       => 'No No',
                'email'      => 'nono@gmail.com',
                'role'       => 'administrator',
                'phone'      => '09776776776',
                'password'   => Hash::make('password'),
                'remark'     => null,
                'company_id' => fake()->numberBetween(1, 5),
                'created_at' => now(),
            ]
        ];

        $managers = [
            [
                'name'       => 'Manager User',
                'email'      => 'manager@gmail.com',
                'role'       => 'manager',
                'phone'      => '09223223223',
                'password'   => Hash::make('password'),
                'remark'     => null,
                'company_id' => fake()->numberBetween(1, 5),
                'created_at' => now(),
            ],[
                'name'       => 'Ho Ho',
                'email'      => 'hoho@gmail.com',
                'role'       => 'manager',
                'phone'      => '09881881881',
                'password'   => Hash::make('password'),
                'remark'     => null,
                'company_id' => fake()->numberBetween(1, 5),
                'created_at' => now(),
            ]
        ];

        $users = [
            [
                'name'       => 'User',
                'email'      => 'user@gmail.com',
                'role'       => "user",
                'phone'      => '09331331331',
                'remark'     => null,
                'password'   => Hash::make('password'),
                'company_id' => fake()->numberBetween(1, 5),
                'created_at' => now(),
            ],[
                'name'       => 'Go Go',
                'email'      => 'gogo@gmail.com',
                'role'       => 'user',
                'phone'      => '09665665665',
                'password'   => Hash::make('password'),
                'remark'     => null,
                'company_id' => fake()->numberBetween(1, 5),
                'created_at' => now(),
            ]
        ];

        User::insert($admins);
        User::insert($managers);
        User::insert($users);
    }
}
