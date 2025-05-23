<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    Schema::create('odontologos', function (Blueprint $table) {
    $table->id();
    $table->string('nombre');
    $table->string('apellido');
    $table->string('telefono')->nullable();
    $table->string('email')->unique();
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('odontologos');
    }
};
