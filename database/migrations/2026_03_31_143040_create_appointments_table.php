<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up(): void {
    Schema::create('appointments', function (Blueprint $table) {
        $table->id();
       
        $table->foreignId('doctor_id')->constrained()->onDelete('cascade'); // Relie le RDV à un docteur
        // cette ligne en n'a pas dans le tableau 
      //   $table->foreignId('patient_id')->constrained()->onDelete('cascade');
           $table->foreignId('patient_id')->nullable()->change();
         $table->date('date');
        $table->string('time');
        $table->string('patient_name');
        $table->string('patient_phone');
        $table->text('reason')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
