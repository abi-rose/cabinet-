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
        Schema::create('rendez__vouses', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('heure');
            $table->foreignId('medecin_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('patient_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendez__vouses');
    }
};