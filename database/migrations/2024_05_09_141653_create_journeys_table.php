<?php

use App\Models\Journey;
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
        Schema::create('journeys', function (Blueprint $table) {
            $table->id();
            $table->string('work');
            $table->string('division');
            $table->string('period');
            $table->foreignId("information_id")->constrained("informations")->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
        $journeys = [
            [
                "work" => "Google Inc",
                "division" => "Software Engineering",
                "period" => "2030-2035",
                "information_id" => 1

            ],
            [
                "work" => "Twitter Inc.",
                "division" => "Visual Creator",
                "period" => "2035-2039",
                "information_id" => 1

            ],
            [
                "work" => "Facebook Inc.",
                "division" => "Software Engineering",
                "period" => "2040-2045",
                "information_id" => 1

            ]
        ];
        collect($journeys)->each(function ($journey) {
            Journey::create($journey);
        }); 
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exprerience_journeys');
    }
};
