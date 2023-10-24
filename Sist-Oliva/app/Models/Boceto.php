<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boceto extends Model
{
    protected $fillable=['negocio','objetivo','publico','contenido','url_logo','url_img'];
    protected $table='bocetos';



    
    use HasFactory;
}
