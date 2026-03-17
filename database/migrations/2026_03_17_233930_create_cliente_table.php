<?php
// database/migrations/xxxx_create_cliente_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crea la tabla cliente en la base de datos.
     */
    public function up(): void
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->id();                              // id INT, PK, autoincrement
            $table->string('nombre');                  // nombre VARCHAR
            $table->string('apellido_paterno');        // apellido_paterno VARCHAR
            $table->string('apellido_materno');        // apellido_materno VARCHAR
            $table->string('rfc')->unique();           // rfc VARCHAR, único
            $table->timestamps();                      // created_at y updated_at
        });
    }

    /**
     * Revierte la migración (elimina la tabla).
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};