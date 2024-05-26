<?php

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
        Schema::create('social_medias', function (Blueprint $table) {
            $table->id();
            $table->string("platform");
            $table->string("link")->nullable();
            $table->foreignId("information_id")->constrained("informations")->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });

        SocialMedia::firstOrCreate([
            "platform" => "dwa",
            "link" => "https://www.facebook.com/AlfianRamadani777",
            "information_id" => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_media');
    }
};
