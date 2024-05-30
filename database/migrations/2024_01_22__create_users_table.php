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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('Username')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telephone')->nullable();
            $table->string('cin')->nullable();
            $table->foreignId('playlist_id')->constrained('playlistes')->onDelete('cascade');
            $table->string('profile_picture')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('img')->nullable();
            $table->string('path')->nullable();
            $table->integer('activation')->default(0);
            $table->timestamps();
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
