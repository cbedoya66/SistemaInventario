<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Producto
 *
 * @property $id
 * @property $cod_barra
 * @property $nombre
 * @property $precio
 * @property $descripcion
 * @property $impuesto
 * @property $imagen
 * @property $categoria
 * @property $proveedor
 * @property $estado
 * @property $placa
 * @property $stock
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 * @property $pedido_id
 * @property $categoria_id
 *
 * @property Categoria $categoria
 * @property Pedido $pedido
 * @property PedidoProducto[] $pedidoProductos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    use SoftDeletes;

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['cod_barra', 'nombre', 'precio', 'descripcion', 'impuesto', 'imagen', 'categoria', 'proveedor', 'estado', 'placa', 'stock', 'pedido_id', 'categoria_id'];


    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pedido()
    {
        return $this->belongsTo(\App\Models\Pedido::class, 'pedido_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedidoProductos()
    {
        return $this->hasMany(\App\Models\PedidoProducto::class, 'id', 'producto_id');
    }
}
