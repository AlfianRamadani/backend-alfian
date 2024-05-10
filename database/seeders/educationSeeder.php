<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class educationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("education_journeys")->insert([
            [
                'title' => 'MTsN 2 Balikpapan',
                'sub_title' => 'Lorem ipsum dolor sit.',
                'period' => '2019-2022'
            ],
            [
                'title' => 'SMK Negeri 2 Balikpapan',
                'sub_title' => 'Rekayasa Perangkat Lunak',
                'period' => '2022-2025'
            ],
            [
                'title' => 'Institut Teknologi Bandung',
                'sub_title' => 'Teknik Informatika',
                'period' => '2025-2029'
            ]
        ]);

    }
}
