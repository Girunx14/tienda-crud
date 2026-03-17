<?php
// database/migrations/xxxx_create_producto_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crea la tabla producto en la base de datos.
     */
    public function up(): void
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id();                                       // ID INT, PK, autoincrement
            $table->string('nombre');                           // nombre VARCHAR
            $table->string('cantidad');                         // cantidad VARCHAR
            $table->decimal('precio', 10, 2);                  // precio DECIMAL(10,2)
            $table->string('categoria');                        // categoria VARCHAR
            $table->timestamps();                               // created_at y updated_at
        });
    }

    /**
     * Revierte la migración (elimina la tabla).
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};