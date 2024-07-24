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
        Schema::create('screen_rooms', function (Blueprint $table) {
            $table->id('screen_room_id');
            $table->foreignId('theater_id')->constrained('theaters')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->integer('seats_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('screen_rooms');
    }
};
