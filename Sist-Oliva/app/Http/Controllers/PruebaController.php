<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PruebaController extends Controller
{
    function index(Request $request){

        //vista prueba
        // return view('prueba');
        
        return  $request;
    }
    function imagen(Request $request){
        //recepciona una image y la almace en una carpeta
        $imagen =  $request->file('file')->store('public');
        //cambia el nombre de la imagen para poder subirla a una DB
        $url = Storage::url($imagen);
    }
}
