<?php

namespace Database\Seeders;

use App\Models\Information;
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
        DB::table("educations")->insert([
            [
                'school' => 'MTsN 2 Balikpapan',
                'major' => 'Lorem ipsum dolor sit.',
                'period' => '2019-2022',
            ],
            [
                'school' => 'SMK Negeri 2 Balikpapan',
                'major' => 'Rekayasa Perangkat Lunak',
                'period' => '2022-2025',

            ],
            [
                'school' => 'Institut Teknologi Bandung',
                'major' => 'Teknik Informatika',
                'period' => '2025-2029',

            ]
            
        ]);
        

    }
}
