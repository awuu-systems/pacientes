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
        Schema::create('mnt_enfermedad_registrada', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_enfermedad_cronica')->constrained('ctl_enfermedad_cronica');
            $table->foreignId('id_paciente')->constrained('mnt_paciente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnt_enfermedad_registrada');
    }
};
