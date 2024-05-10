<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("projects")->insert([
            [
                'title' => "project 1",
                'subtitle' => "its about project 1",
                'img_path' => "blah",
                "information_id" => 1
            ],
            [
                'title' => "project 2",
                'subtitle' => "its about project 2",
                'img_path' => "blah",
                "information_id" => 1
            ],
            [
                'title' => "project 3",
                'subtitle' => "its about project 3",
                'img_path' => "blah",
                "information_id" => 1
            ],
            [
                'title' => "project 4",
                'subtitle' => "its about project 4",
                'img_path' => "blah",
                "information_id" => 1
            ],
        ]);    }
}
