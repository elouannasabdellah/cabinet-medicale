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
        // On crée la table proprement
        Schema::create('availabilities', function (Blueprint $table) {
            $table->id();
            
            // Relation avec la table doctors (vérifie que ta table s'appelle bien 'doctors')
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade');
            
            // La date qui servira de modèle (ex: un lundi passé)
            $table->date('available_date'); 
            
            // L'heure de début et de fin de la plage
            $table->time('start_time');     
            $table->time('end_time');       
            
            // La durée de chaque rendez-vous (30 min par défaut)
            $table->integer('duration')->default(30); 
            
            // État du créneau
            $table->boolean('is_booked')->default(false);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availabilities');
    }
};