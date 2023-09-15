<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SistOliva;
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

    public function sistOliva(){
        return $this->hasMany(SistOliva::class);
    }
    public function producto(){
        return $this->belongsTo(Producto::class);
    }
    use HasFactory;
}
