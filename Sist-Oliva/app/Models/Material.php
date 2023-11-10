<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = "materiales";
    protected $fillable = ['nombre', 'descripcion', 'cod_interno', 'stock', 'unidad_medida', 'fecha_adquisicion', 'fecha_vencimiento', 'notas'];

    // id integer pk
    // nombre string
    // descripcion string
    // cod_interno string
    // stock string
    // unidad_medida string
    // fecha_adquisicion date
    // fecha_vencimiento date
    // notas string
    use HasFactory;
}
