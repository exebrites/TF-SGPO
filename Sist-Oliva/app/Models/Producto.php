<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Disenio;
use App\Models\SistOliva;
use App\Models\Pedido;
use App\Models\Categoria;

class Producto extends Model
{
/*----------------------------ATRIBUTOS----------------------------------------*/
    /*AGREGAR ATRIBUTOS*/
    private string $nombre;
    private float $precio;
/*----------------------------METODOS-----------------------------------------*/

    /*AGREGAR METODOS*/
    public function isID($idProducto){

        //retorna boolean

        
    }
    public function ingresarDiseño(){
        /*PARAMETROS
        unProducto,diseño,texto,boolean
        */
    }
    public function agregar(){
        //Paramtro: unDiseño
    }
/*----------------------------RELACIONES----------------------------------------*/
    /*AGREGAR RELACIONES*/
    public function disenio(){
        return $this->hasOne(Disenio::class,'idProducto'); //tiene como FK a idproducto
    }

     //SIN PROBAR 

     public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    } 

    public function sistOliva(){
        return $this->hasMany(SistOliva::class,'idSistema');
    }
    
    public function pedido (){
        return $this->hasMany(Pedido::class);
    }

    use HasFactory;
}
