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
        Schema::create('players', function (Blueprint $table){
            $table->id();
            $table->string('pfp')->nullable();
            $table->string('name', 50);
            $table->string('team', 50);
            $table->string('height', 30);
            $table->string('weight',30);
            $table->integer('age');
            $table->string('country', 50);
            $table->string('yearspro', 10);
            $table->integer('points');
            $table->integer('rebounds');
            $table->integer('assists');
            $table->integer('blocks');
            $table->integer('steals');
            $table->integer('turnovers');
            $table->integer('threepoints');
            $table->integer('freethrows');
            $table->float('fantasy');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
