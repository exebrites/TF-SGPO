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
    protected $table = 'productos';
    protected $fillable = ['name','price','slug','description','category_id','image_path','alias'];
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
    
    public function pedidos()
    {
        return $this->hasMany('\App\Models\Pedido','productos_id','');

    }

    use HasFactory;
}
