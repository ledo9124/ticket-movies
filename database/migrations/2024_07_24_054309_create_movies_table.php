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
        Schema::create('movies', function (Blueprint $table) {
            $table->id('movie_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('director')->nullable();
            $table->text('actors')->nullable();
            $table->string('genre')->nullable();
            $table->date('release_date')->nullable();
            $table->string('trailer')->nullable();
            $table->string('poster')->nullable();
            $table->enum('status', ['coming soon', 'now showing'])->default('coming soon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
