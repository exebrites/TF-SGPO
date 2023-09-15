<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
class Disenio extends Model
{

/*----------------------------ATRIBUTOS----------------------------------------*/
  

/*----------------------------METODOS-----------------------------------------*/


/*----------------------------RELACIONES----------------------------------------*/
    /*AGREGAR ATRIBUTOS*/

    /*AGREGAR METODOS*/

    /*AGREGAR RELACIONES*/
    public function producto(){
        return $this->belongsTo('App\Models\Producto');
    }
    use HasFactory;
}
