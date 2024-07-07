<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Information;
use Faker\Factory as Faker;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $data = [
            [
                "name" => "Alfian Ramadani",
                "country" => "Indonesia",
                "description_1" => "I am a FullStack Developer based in Indonesia, passionate about crafting robust and user-friendly web applications.",
                "description_2" => "I've been studying programming for 2 years, especially web programming. I am passionate about creating websites and am thrilled to present this portfolio, showcasing my skills and projects.",
                "description_3" => "My journey in web development is driven by a strong motivation to learn and grow. I approach each project with enthusiasm and a positive attitude, always striving to create the best user experience possible.",
                "description_4" => "As a FullStack Developer based in Indonesia, I specialize in both front-end and back-end web development. My journey in programming has been driven by a love for coding and problem-solving, and I am always eager to learn new technologies and improve my craft. This portfolio is a testament to my dedication and the diverse projects I have worked on.",
                "email" => "Alfianr792@gmail.com",
                "position" => "FullStack Developer",
                "contact_person" => "+62 895-3418-13016",
                'projects_done' => 10,
                "experience" => 2,
                "satisfication" => 98,
                "avatar" => $faker->imageUrl()
            ],
            [
                "name" => "Alfian Ramadana",
                "country" => "Indonesia",
                "description_1" => "I am a FullStack Developer based in Indonesia, passionate about crafting robust and user-friendly web applications.",
                "description_2" => "I've been studying programming for 2 years, especially web programming. I am passionate about creating websites and am thrilled to present this portfolio, showcasing my skills and projects.",
                "description_3" => "My journey in web development is driven by a strong motivation to learn and grow. I approach each project with enthusiasm and a positive attitude, always striving to create the best user experience possible.",
                "description_4" => "As a FullStack Developer based in Indonesia, I specialize in both front-end and back-end web development. My journey in programming has been driven by a love for coding and problem-solving, and I am always eager to learn new technologies and improve my craft. This portfolio is a testament to my dedication and the diverse projects I have worked on.",
                "email" => "Alfianr792@gmail.com",
                "position" => "FullStack Developer",
                "contact_person" => "+62 895-3418-13016",
                'projects_done' => 10,
                "experience" => 2,
                "satisfication" => 98            ,
                "avatar" => $faker->imageUrl()

            ],
        ];

        foreach ($data as $item) {
            Information::create($item);
        }
    }
}
