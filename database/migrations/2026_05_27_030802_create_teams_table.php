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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();

            // Basicly ini untuk nama table    
            $table->string('name',50);          
            $table->string('city', 50);          
            $table->string('abbreviation', 10);  

            $table->string('logo', 255)->nullable();

            $table->string('conference', 50);    
            $table->string('division', 50);      
    
            $table->integer('wins')->default(0);
            $table->integer('losses')->default(0);
            $table->string('arena', 100);

            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
