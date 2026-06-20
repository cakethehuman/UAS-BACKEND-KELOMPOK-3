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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
	    $table->foreignId('user_id')->nullable()->constrained(); 
	    $table->foreignId('seat_id')->constrained();
	    $table->boolean('is_booked')->default(false);
            $table->timestamps();
	    $table->unique(['user_id', 'seat_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
