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
            $table->string('name');
            $table->string('team');
            $table->string('height');
            $table->string('weight');
            $table->integer('age');
            $table->string('country');
            $table->string('yearspro');
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
