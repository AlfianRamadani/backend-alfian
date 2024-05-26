<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     
           $posts = [
            [
                "title" => "5 Tips Jitu Memaksimalkan Produktivitas di Tempat Kerja",
                "content" => "Produktivitas di tempat kerja sangat penting untuk mencapai tujuan karier Anda. Berikut adalah lima tips praktis yang dapat membantu Anda meningkatkan produktivitas Anda sehari-hari.",
                "category" => [1,2]
            ],
            [
                "title" => "Panduan Langkah-demi-Langkah: Belajar Bahasa Pemrograman Python dari Dasar",
                "content" => "Jika Anda tertarik untuk mempelajari bahasa pemrograman Python, panduan ini akan membantu Anda memulai dari dasar. Mulai dari instalasi Python hingga pemahaman dasar sintaksis, Anda akan belajar semua yang perlu Anda ketahui untuk memulai perjalanan pemrograman Anda.",
                "category" => [2]
            ],
            [
                "title" => "Perkembangan Terbaru dalam Teknologi Kecerdasan Buatan (AI)",
                "content" => "Teknologi kecerdasan buatan terus berkembang pesat. Artikel ini memberikan gambaran tentang perkembangan terbaru dalam bidang AI, termasuk penggunaan dalam berbagai industri, penemuan terbaru, dan proyek-proyek inovatif yang sedang dilakukan oleh para peneliti AI.",
                "category" => [3,4]
            ],
            [
                "title" => "Sejarah Perkembangan Internet: Dari ARPANET hingga Era Modern",
                "content" => "Internet telah mengalami perkembangan yang luar biasa sejak awalnya diciptakan sebagai proyek ARPANET. Artikel ini menjelajahi sejarah perkembangan internet, termasuk tonggak-tonggak penting, teknologi yang mendasarinya, dan dampaknya terhadap masyarakat modern.",
                "category" => [4]
            ]
        ];
        collect($posts)->each(function ($post) {
            $postmodel = new post();
            $category = new Category();
            $postmodel->title = $post["title"];
            $postmodel->content = $post["content"];
            $postmodel->save();
            $postmodel->categories()->attach($post["category"]);
            
        });
    }
}
