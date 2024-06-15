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
            $table->string('avatar')->nullable();
            $table->string('satisfication');
            $table->timestamps();
        
        });
       
      
   }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information');
    }
};
