<?php

use App\Models\Category;
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("category");
            $table->timestamps();
        });
        $categories = [[
            "category" => "Tips & Trick"
        ],[
            "category" => "Tutorial"

        ],[
            "category" => "News"

        ],[
            "category" => "Knowledge"

        ]];
        collect($categories)->each(function ($category) {
            Category::create($category);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
