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
        Schema::create('formateurs', function (Blueprint $table) {
            $table->id();
            $table->string('Username')->nullable();
            $table->string('email_formateur')->unique();
            $table->string('specialite')->nullable(); 
            $table->string('password');
            $table->string('telephone')->nullable();
            $table->string('cin')->nullable();
            $table->string('Course_Code')->nullable();
            $table->string('profile_picture')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formateurs');
    }
};
