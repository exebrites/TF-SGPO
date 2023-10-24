<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
use App\Models\Pedido;

class Disenio extends Model
{
    protected $table = 'disenios';

    protected $fillable = ['url','disenio_estado'];

    /*----------------------------ATRIBUTOS----------------------------------------*/


    /*----------------------------METODOS-----------------------------------------*/


    /*----------------------------RELACIONES----------------------------------------*/
    /*AGREGAR ATRIBUTOS*/

    /*AGREGAR METODOS*/

    /*AGREGAR RELACIONES*/
    // public function producto()
    // {
    //     return $this->belongsTo('App\Models\Producto');
    // }
    public function pedido(){
        return $this->hasOne('App\Models\Pedido','disenios_id','');
    }
    use HasFactory;
}
