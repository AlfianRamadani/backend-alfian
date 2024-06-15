<?php

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
        Schema::create('setactives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('information_id')->constrained('informations')->default(0)->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('education_id')->constrained('educations')->default(0)->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('experience_id')->constrained('experiences')->default(0)->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setactives');
    }
};
