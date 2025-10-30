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
        Schema::create('productos', function (Blueprint $table) {
            $table->id(); // id BIGINT UNSIGNED AUTO_INCREMENT
            $table->string('nombre', 255); // nombre del producto
            $table->text('descripcion'); // descripción del producto
            $table->decimal('precio', 10, 2); // precio
            $table->integer('stock')->default(0); // stock
            $table->unsignedBigInteger('id_tipo'); // llave foránea a tipo_productos
            $table->string('marca', 50); // marca del producto
            $table->enum('estado', ['Disponible', 'Agotado', 'Descontinuado'])->default('Disponible'); // estado
            $table->timestamps(); // created_at y updated_at

            // Si quieres agregar la FK directamente en la migración
            // $table->foreign('id_tipo')->references('id')->on('tipo_productos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
