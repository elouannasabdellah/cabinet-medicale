<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('patients', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }
      public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();

            // Lien avec la table users
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Informations du patient
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('gender')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
