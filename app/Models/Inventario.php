<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
        use HasFactory;

    protected $table = 'inventarios';

    protected $fillable = [
        'nombre',
        'tamaño',
        'tiempo1',
        'tiempo2',
        'tiempo3',
        'tiempo4',
        'lavado',
        'deposito',
        'cantidad',
        'disponible',
        'estado'
    ];
}
