<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Producto;

class Pedido extends Model
{

    /*----------------------------ATRIBUTOS----------------------------------------*/


    /*----------------------------METODOS-----------------------------------------*/


    /*----------------------------RELACIONES----------------------------------------*/

    /*AGREGAR ATRIBUTOS*/

    /*AGREGAR METODOS*/

    /*AGREGAR RELACIONES*/

    //SIN PROBAR 

    public function productos()
    {
        return $this->hasMany(Producto::class,'producto_id');
    }
    public function clientes()
    {
        return $this->hasMany(Cliente::class,'cliente_id');
    }

    use HasFactory;
}
