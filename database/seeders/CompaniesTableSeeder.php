<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [ 'name' => 'Tech Wave Solutions', 'email' => 'techwavesolution@gmail.com', 'website' => fake()->url(), 'created_at' => now(), ],
            [ 'name' => 'Inno Vision Systems', 'email' => 'innovisionsystem@gmail.com', 'website' => fake()->url(), 'created_at' => now(), ],
            [ 'name' => 'Code Craft Lab',      'email' => 'codecraftlab@gmail.com',     'website' => fake()->url(), 'created_at' => now(), ],
            [ 'name' => 'NexGen IT Services',  'email' => 'nexgenit@gmail.com',         'website' => fake()->url(), 'created_at' => now(), ],
            [ 'name' => 'Smart Matrix IT',     'email' => 'smartmatrixit@gmail.com',    'website' => fake()->url(), 'created_at' => now(), ],
        ];

        Company::insert($companies);
    }
}
