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
            [ 'name' => 'Tech Wave Solutions', 'email' => 'techwavesolution@gmail.com'],
            [ 'name' => 'Inno Vision Systems', 'email' => 'innovisionsystem@gmail.com'],
            [ 'name' => 'Code Craft Lab',      'email' => 'codecraftlab@gmail.com'],
            [ 'name' => 'NexGen IT Services',  'email' => 'nexgenit@gmail.com'],
            [ 'name' => 'Smart Matrix IT',     'email' => 'smartmatrixit@gmail.com'],
        ];

        Company::insert($companies);
    }
}
