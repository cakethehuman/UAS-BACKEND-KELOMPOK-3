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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            
            // Basic info
            $table->string('name');          
            $table->string('city');          
            $table->string('abbreviation');  
            // NBA structure
            $table->string('conference');    
            $table->string('division');      
            // Team performance
            $table->integer('wins')->default(0);
            $table->integer('losses')->default(0);
            $table->string('arena');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
