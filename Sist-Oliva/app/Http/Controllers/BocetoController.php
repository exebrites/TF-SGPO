<?php

namespace App\Http\Controllers;

use App\Models\Boceto;
use App\Models\Disenio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BocetoController extends Controller
{
    function index()
    {
        $bocetos=Boceto::all();
        return view('boceto.index',['bocetos'=>$bocetos]);
    }
    function store(Request $request)
    {

        // disenio_estado toma el valor de no tiene 
        // $ultimoId = Disenio::max('id');
        // //    return \Cart::getSubTotal();

        // $disenio = Disenio::find($ultimoId);
        // $disenio->update(['disenio_estado' => true]);


        // ---------------------------------
        $img_logo =  $request->file('logo')->store('public');
        $url_logo = Storage::url($img_logo);

        // // ------------------------
        $img_img =  $request->file('img')->store('public');
        $url_img = Storage::url($img_img);

        Boceto::create([
            'negocio' => $request->nombre,
            'objetivo' => $request->objetivo,
            'publico' => $request->publico,
            'contenido' => $request->contenido,
            'url_logo' => $url_logo,
            'url_img' => $url_img
        ]);

        return redirect()->route('cart.index')->with('success_msg', 'Se cargó con exito la informacion para crear un boceto, pronto nos comunicaremos con usted !');
    }
    function create()
    {
        return view('boceto.create');
    }
}
