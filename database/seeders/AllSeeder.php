<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            educationSeeder::class,
            experienceSeeder::class,
            experienceSeeder::class,
            informationSeeder::class,
            ProjectsSeeder::class
        ]);
    }
}
