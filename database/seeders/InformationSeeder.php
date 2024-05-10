<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class informationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('information')->insert([
            'name' => "Alfian Ramadani",
            'position' => "Fullstack Developer",
            'projects_done' => 15,
            'impression' => 2,
            'clients_satisfication' => 90,
            'country' => 'indonesia'
        ]);

 
    }
}
