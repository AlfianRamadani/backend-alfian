<?php

use App\Models\information;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country');
            $table->text('description_1');
            $table->text('description_2')->nullable();
            $table->text('description_3')->nullable();
            $table->text('description_4')->nullable();
            $table->string('position');
            $table->string('email');
            $table->string('contact_person');
            $table->string('projects_done');
            $table->string('experience');
            $table->string('satisfication');
            $table->string('avatar')->nullable();
            $table->timestamps();
        
        });
        information::firstOrCreate([
            "name" => "Alfian Ramadani",
            "country" => "Indonesia",
            "description_1" => "I am a FullStack Developer based in Indonesia, passionate about crafting robust and user-friendly web applications.",
            "description_2"=> "I've been studying programming for 2 years, especially web programming.I am passionate about creating websites and am thrilled to present this portfolio, showcasing my skills and projects.",
            "description_3" => "My journey in web development is driven by a strong motivation to learn and grow. I approach each project with enthusiasm and a positive attitude, always striving to create the best user experience possible.",
            "description_4" => "As a FullStack Developer based in Indonesia, I specialize in both front-end and back-end web development. My journey in programming has been driven by a love for coding and problem-solving, and I am always eager to learn new technologies and improve my craft. This portfolio is a testament to my dedication and the diverse projects I have worked on.",
            "email" => "Alfianr792@gmail.com",
            "position" => "FullStack Developer",
            "contact_person" => "+62 895-3418-13016",
            'projects_done' => "10",
            "experience" => "2",
            "satisfication" => "98"

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information');
    }
};
