<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            // On change la colonne pour qu'elle accepte le vide (NULL)
            $table->foreignId('patient_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            // En cas de retour en arrière, on la remet obligatoire
            $table->foreignId('patient_id')->nullable(false)->change();
        });
    }
};