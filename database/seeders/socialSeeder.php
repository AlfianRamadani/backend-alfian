<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class socialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("social_media")->insert([
            [
                'linkedin' => 'https://www.linkedin.com/in/alfian-ramadani-993716...',
                'facebook' => 'https://www.facebook.com/AlfianRamadani777',
                'instagram' => 'https://www.instagram.com/_alfianramadani/',
                'discord' => 'https://www.discord.com',
                'twitter' => 'https://www.twitter.com',
       
            ]
        ]);
    }
}
