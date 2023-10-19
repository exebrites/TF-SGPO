<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Producto;

class Pedido extends Model
{
    protected $table="pedidos";
    protected $fillable = ['clientes_id', 'productos_id', 'fecha_inicio', 'fecha_entrega', 'estado', 'disenio_estado', 'cantidad','subtotal'];
  
    /*----------------------------ATRIBUTOS----------------------------------------*/


    /*----------------------------METODOS-----------------------------------------*/


    /*----------------------------RELACIONES----------------------------------------*/

    /*AGREGAR ATRIBUTOS*/

    /*AGREGAR METODOS*/

    /*AGREGAR RELACIONES*/

    //SIN PROBAR 

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
    public function cliente()
    {
        // llamo al modelo, fk en tabla pedidos, pk en tabla clientes
        // como se llama pk de clientes en tabla pedidos
        return $this->belongsTo('\App\Models\Cliente','clientes_id','id');
    }

    use HasFactory;
}
