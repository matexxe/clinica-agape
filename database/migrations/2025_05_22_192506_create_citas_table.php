<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    Schema::create('citas', function (Blueprint $table) {
    $table->id();
    $table->foreignId('paciente_id')->constrained('pacientes')->onDelete('cascade');
    $table->foreignId('odontologo_id')->constrained('odontologos')->onDelete('cascade');
    $table->date('fecha');
    $table->time('hora');
    $table->text('motivo')->nullable();
    $table->enum('estado', ['pendiente', 'confirmada', 'cancelada', 'completada'])->default('pendiente');
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
