<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SistOliva;

class Cliente extends Model
{

    protected $fillable = ['DNI','nombre','apellido','correo','telefono','idSistema'];
/*----------------------------ATRIBUTOS----------------------------------------*/
  

/*----------------------------METODOS-----------------------------------------*/


/*----------------------------RELACIONES----------------------------------------*/

    /*AGREGAR ATRIBUTOS*/

    /*AGREGAR METODOS*/

    /*AGREGAR RELACIONES*/ 
    
    //SIN PROBAR 

    public function sistOliva(){
        return $this->belongsTo(SistOliva::class);
    }

    use HasFactory;
}
