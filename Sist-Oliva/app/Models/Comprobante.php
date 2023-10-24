<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    protected $table = 'comprobantes';
    protected $fillable= ['url_comprobantes'];
    
    use HasFactory;
}
