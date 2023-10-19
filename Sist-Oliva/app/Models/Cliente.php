<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SistOliva;

class Cliente extends Model
{
    protected $table = "clientes";
    protected $fillable = ['dni','nombre','apellido','telefono','correo'];
/*----------------------------ATRIBUTOS----------------------------------------*/
  

/*----------------------------METODOS-----------------------------------------*/


/*----------------------------RELACIONES----------------------------------------*/

    /*AGREGAR ATRIBUTOS*/

    /*AGREGAR METODOS*/

    /*AGREGAR RELACIONES*/ 
    
    //SIN PROBAR 

    public function pedidos()
    {
        //llamado al modelo, como es fk en tabla pedidos, como es pk
        return $this->hasMany('\App\Models\Pedido','clientes_id','');
    }

    use HasFactory;
}
