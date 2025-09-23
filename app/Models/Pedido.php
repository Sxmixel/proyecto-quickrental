<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada en la base de datos
    protected $table = 'pedidos';

    // Campos asignables en la tabla 'tipos'
    protected $fillable = [
        'nombre',
        'telefono',
        'email',
        'objeto',
        'cantidad',
        'tiempo',
        'dia',
        'hora',
        'direccion',
        'estado'
    ];
}
