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
        Schema::create('tipo_productos', function (Blueprint $table) {
            $table->id(); // id bigint(20) AUTO_INCREMENT
            $table->string('nombre_tipo', 255); // nombre_tipo varchar(255)
            $table->string('descripcion_tipo', 255); // descripcion_tipo varchar(255)
            $table->string('beneficio_principal', 150); // beneficio_principal varchar(150)
            $table->enum('estado', ['Activo', 'Inactivo']); // estado enum('Activo','Inactivo')
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_productos');
    }
};
