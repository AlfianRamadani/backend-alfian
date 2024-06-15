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
        DB::table("social_medias")->insert([
            [
                'platform' => 'linkedin',
                'link' => 'https://www.linkedin.com/in/alfian-ramadani-993716...'
            ],
            [
                'platform' => 'facebook' ,
                'link' => 'https://www.facebook.com/AlfianRamadani777',
            ],
            [
                'platform' => 'instagram',
                'link' => 'https://www.instagram.com/alfianramadani777/'
            ],
            [
                'platform' => 'discord',
                'link' => 'https://discord.com/channels/@me/alfianramadani'
            ],
            [
                'platform' => 'twitter',
                'link' => 'https://twitter.com/alfianramadani77'
            ],
            [
                'platform' => 'github',
                'link' => 'https://github.com/AlfianRamadani'
            ]
        ]);
    }
}
