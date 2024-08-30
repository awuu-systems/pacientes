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
        Schema::create('mnt_paciente', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('id_usuario')->constrained('users');
            $table->string('diagnostico');
            $table->string('peso');
            $table->string('alergias');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnt_paciente');
    }
};
