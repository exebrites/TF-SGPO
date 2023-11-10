<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table='proveedores';
    protected $fillable=['nombre_empresa','nombre_contacto','cuit','telefono','correo'];
    // id integer pk
    // nombre_empresa string
    // nombre_contacto string
    // cuit string
    // telefono string
    // correo string
    
    use HasFactory;
}
