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
        Schema::table('teams', function (Blueprint $table) {
            $table->integer('rank')->nullable();
            $table->string('pct')->nullable();
            $table->string('gb')->nullable();
            $table->string('home')->nullable();
            $table->string('away')->nullable();
            $table->string('last10')->nullable();
            $table->string('streak')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn(['rank', 'pct', 'gb', 'home', 'away', 'last10', 'streak']);
        });
    }
};
