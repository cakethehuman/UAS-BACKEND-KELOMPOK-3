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
        Schema::create('games', function (Blueprint $table) {
            $table->id('game_id');
            
            $table->foreignId('home_team_id')->constrained('teams', 'team_id');
            $table->foreignId('away_team_id')->constrained('teams', 'team_id');
            $table->dateTime("scheduled_date");
            $table->string('game_status', 50)->default('Scheduled');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
