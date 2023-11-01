<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table = "detalle_pedidos";
    protected $fillable = ['pedido_id', 'producto_id', 'disenio_id', 'cantidad', 'subtotal'];



    public function pedidos()
    {
        return $this->belongsTo('\App\Models\Pedido', 'pedido_id', 'id');
    }

    public function producto()
    {
        return $this->belongsTo('\App\Models\Producto', 'producto_id', 'id');
    }
    use HasFactory;
}
