<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    use HasFactory;

    // 🔹 Nombre de la tabla
    protected $table = 'tipo_productos';

    // 🔹 Campos permitidos
    protected $fillable = [
        'nombre',
    ];

    // 🔹 Relación: un tipo de producto tiene muchos productos
    public function productos()
    {
        return $this->hasMany(productos::class, 'tipo_producto_id', 'id');
    }
}
