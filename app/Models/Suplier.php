<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'nit_proveedor',
        'nombre',
        'direccion',
        'telefono',
        'contacto',
        'estado'
    ];
}
