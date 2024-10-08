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
        Schema::create('mnt_medicamento_asignado', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_medicamento')->constrained('ctl_medicamento');
            $table->foreignId('id_cita_medica')->constrained('mnt_cita_medica_asignada');
            $table->string('dosis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnt_medicamento_asignado');
    }
};
