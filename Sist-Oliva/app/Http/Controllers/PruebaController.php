<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    function index(){

        //vista prueba
        return view('prueba');
    }
}
