<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    use HasFactory;

    // 🔹 Nombre de la tabla
    protected $table = 'productos';

    // 🔹 Campos que se pueden llenar de forma masiva
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'tipo_producto_id', // <- Clave foránea estándar
    ];

    // 🔹 Relación: un producto pertenece a un tipo de producto
    public function tipoProducto()
    {
        return $this->belongsTo(TipoProducto::class, 'tipo_producto_id', 'id');
    }
}
