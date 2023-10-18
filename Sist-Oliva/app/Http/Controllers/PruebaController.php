<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PruebaController extends Controller
{
    function index(){

        //vista prueba
        return view('prueba');
      
    }
    function imagen(Request $request){
        $imagen =  $request->file('file')->store('public');
        $url = Storage::url($imagen);
    }
}
