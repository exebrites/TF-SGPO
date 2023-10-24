<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Disenio;
use Illuminate\Http\Request;
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
        // recepciona una image y la almace en una carpeta
        $imagen =  $request->file('file')->store('public');
        //cambia el nombre de la imagen para poder subirla a una DB
        $estado=$request->filled('miCheckbox');
        $url = Storage::url($imagen);
        Disenio::create([
            'url' => $url,
            'disenio_estado' => !$estado
        ]);
        // Reemplaza 'TuModelo' con el nombre de tu modelo



        // return 'diseño dado de alta';

        // $nombre = $request->file('file')->getClientOriginalName();
        // $ruta = storage_path() . '\app\public/' . $nombre;
        // Image::make($request->file('file'))
        // ->resize(1200,null,function($constraint){
        //     $constraint->aspectRatio();
        // })
        // ->save($ruta);
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
        $imagen =  $request->file('file')->store('public');
        //cambia el nombre de la imagen para poder subirla a una DB
        $url = Storage::url($imagen);
        $disenio = Disenio::find($id);
        $disenio->update([
            'url' => $url
        ]);
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
