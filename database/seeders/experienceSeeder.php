<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class experienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("experiences")->insert([
            [
                'work' => 'Google Inc.',
                'division' => 'Software Engineering',
                'period' => '2030-2032',
            ],
            [
                'work' => 'Twitter Inc.',
                'division' => 'Visual Designer',
                'period' =>
                '2033-2036',
            ],
            [
                'work' => 'Apple Inc.',
                'division' => 'UI Designer',
                'period' =>
                '2036-2045',
            ]
            
        ]);
        
        
    }
}
