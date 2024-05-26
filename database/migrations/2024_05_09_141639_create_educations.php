<?php

use App\Models\Education;
use App\Models\SocialMedia;
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
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->string('school');
            $table->string('major');
            $table->string('period');
            $table->foreignId("information_id")->constrained("informations")->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
        $educations = [
            [
                "school" => "MTsN 1 Balikpapan",
                "major" => "Islamic School",
                "period" => "2019-2022",
                "information_id" => 1

            ],
            [
                "school" => "SMK Negeri 2 Balikpapan",
                "major" => "Rekayasa Perangkat Lunak",
                "period" => "2022-2025",
                "information_id" => 1

            ],
            [
                "school" => "Institut Teknologi Bandung",
                "major" => "Teknik Informatika",
                "period" => "2025-2029",
                "information_id" => 1

            ]
        ];
        collect($educations)->each(function ($education) {
            Education::create($education);}); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_jurneys');
    }
};
