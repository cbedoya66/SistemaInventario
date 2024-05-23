<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Illuminate\Database\Eloquent\SoftDeletes;


class Pedido extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['pedido_id'];

    public function cliente(): BelongsTo
    {

        return $this->belongsTo(Cliente::class);
    }

    public function productos(): BelongsToMany
    {
        return $this->belongsToMany(Producto::class, 'pedido_producto')
            ->using(PedidoProducto::class)
            ->withPivot('cantidad')
            ->withTimestamps();
    }

    //relacion muchos a muchos con la tabla productos
    public function pedidoproducts()
    {
        return $this->hasMany(PedidoProducto::class);
    }
}
