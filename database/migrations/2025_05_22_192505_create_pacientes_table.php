<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    Schema::create('pacientes', function (Blueprint $table) {
    $table->id();
    $table->string('nombre');
    $table->string('apellido');
    $table->string('telefono')->nullable();
    $table->string('email')->unique();
    $table->date('fecha_nacimiento')->nullable();
    $table->string('password');
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
