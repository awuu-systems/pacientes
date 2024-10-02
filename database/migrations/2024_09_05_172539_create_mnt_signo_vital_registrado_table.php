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
        Schema::create('mnt_signo_vital_registrado', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_paciente')->constrained('mnt_paciente');
            $table->string('presion_sistolica');
            $table->string('presion_diastolica');
            $table->string('frecuencia_respiratoria');
            $table->string('temperatura_farenheit');
            $table->string('temperatura_centigrados');
            $table->string('pulso');
            $table->string('oxigeno_en_la_sangre');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnt_signo_vital_registrado');
    }
};
