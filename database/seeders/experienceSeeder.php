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
        DB::table("experience_journeys")->insert([
            [
                'title' => 'Google Inc.',
                'sub_title' => 'Software Engineering',
                'period' => '2030-2032'
            ],
            [
                'title' => 'Twitter Inc.',
                'sub_title' => 'Visual Designer',
                'period' => '2033-2036'
            ],
            [
                'title' => 'Apple Inc.',
                'sub_title' => 'UI Designer',
                'period' => '2036-2045'
            ]
        ]);
    }
}
