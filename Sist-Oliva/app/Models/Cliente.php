<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SistOliva;

class Cliente extends Model
{

    protected $fillable = ['dni','nombre','apellido','telefono','correo'];
/*----------------------------ATRIBUTOS----------------------------------------*/
  

/*----------------------------METODOS-----------------------------------------*/


/*----------------------------RELACIONES----------------------------------------*/

    /*AGREGAR ATRIBUTOS*/

    /*AGREGAR METODOS*/

    /*AGREGAR RELACIONES*/ 
    
    //SIN PROBAR 

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    use HasFactory;
}
