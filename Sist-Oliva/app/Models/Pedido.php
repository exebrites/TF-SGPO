<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Producto;

class Pedido extends Model
{
    protected $table = "pedidos";
    protected $fillable = ['clientes_id', 'productos_id', 'disenios_id', 'fecha_inicio', 'fecha_entrega', 'estado', 'disenio_estado', 'cantidad', 'subtotal'];

    /*----------------------------ATRIBUTOS----------------------------------------*/


    /*----------------------------METODOS-----------------------------------------*/


    /*----------------------------RELACIONES----------------------------------------*/

    /*AGREGAR ATRIBUTOS*/

    /*AGREGAR METODOS*/

    /*AGREGAR RELACIONES*/

    //SIN PROBAR 

    // public function producto()
    // {
    //     return $this->belongsTo('\App\Models\Producto', 'productos_id', 'id');
    // }

    public function detallePedido()
    {
        // llamo al modelo, fk en tabla pedidos, pk en tabla clientes
        // como se llama pk de clientes en tabla pedidos
        return $this->hasMany('\App\Models\DetallePedido','pedido_id','');
    }
    public function cliente()
    {
        // llamo al modelo, fk en tabla pedidos, pk en tabla clientes
        // como se llama pk de clientes en tabla pedidos
        return $this->belongsTo('\App\Models\Cliente', 'clientes_id', 'id');
    }

    public function disenio()
    {
        return $this->belongsTo('\App\Models\Disenio', 'disenios_id', 'id');
    }
    use HasFactory;
}
