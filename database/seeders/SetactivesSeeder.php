<?php

namespace Database\Seeders;

use App\Models\setactives;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetactivesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        setactives::create([
            'information_id' => 1,
            'education_id' => 1,
            'experience_id' => 1,
        ]);
    }
}
