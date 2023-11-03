<?php

namespace App\Http\Controllers;

use App\Mail\EstadoMailable;
use App\Models\Pedido;
use App\Models\Disenio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class DisenioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disenios = Disenio::all();
        $pedidos = Pedido::all();
        return view('disenio.index', ['disenios' => $disenios, 'pedidos' => $pedidos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('disenio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // detallePedido_id,url_imagen ,url_disenio ,diseno_estado 

        // recepciona una image y la almace en una carpeta
        // //cambia el nombre de la imagen para poder subirla a una DB

        // $imagen =  $request->file('file')->store('public');
        // $url = Storage::url($imagen);

        // return $request;
        $imagen =  $request->file('file')->store('public');
        // $url = Storage::url($imagen);
        $url_imagen = null;
        $url_disenio =  Storage::url($imagen);;
        $diseno_estado = true;

        Disenio::create([
            'detallePedido_id' => 1,
            'url_imagen' => $url_imagen,
            'url_disenio' => $url_disenio,
            'disenio_estado' => $diseno_estado
        ]);

        Mail::to('exe@gmail.com')->send(new EstadoMailable);

        return redirect()->route('disenios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $disenio = Disenio::find($id);
        return view('disenio.create', ['disenio' => $disenio]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $disenio = Disenio::find($id);
        // se envia a update
        return view('disenio.edit', ['disenio' => $disenio]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // detallePedido_id,url_imagen ,url_disenio ,diseno_estado 

        /**
       mueve la imagen a public storage
         *   $imagen =  $request->file('file')->store('public');
        cambia el nombre de la imagen para poder subirla a una DB
         *   $url = Storage::url($imagen);
         */

        $imagen =  $request->file('file')->store('public');
        // // $url = Storage::url($imagen);
        if ($imagen != null) {

            $url_imagen = null;
            $url_disenio =  Storage::url($imagen);;
            $diseno_estado = true;
            $disenio = Disenio::find($id);
            $disenio->update([
                // 'url_imagen' => $url_imagen,
                'url_disenio' => $url_disenio,
                'disenio_estado' => $diseno_estado
            ]);
        }



        return redirect()->route('disenios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $disenio = Disenio::find($id);
        $disenio->delete();
        return redirect()->route('disenios.index');
    }

    function imagen(Request $request)
    {
        //recepciona una image y la almace en una carpeta
        $imagen =  $request->file('file')->store('public');
        //cambia el nombre de la imagen para poder subirla a una DB
        $url = Storage::url($imagen);
    }
}
