<?php

namespace App\Http\Controllers;

use App\Mail\EstadoMailable;
use App\Models\Pedido;
use App\Models\Disenio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\PedidoController;
use App\Models\DetallePedido;

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

        // return view('disenio.create');
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
            'detallePedido_id' => 7,
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
        $disenio = Disenio::find($id);
        $pedido = $disenio->detallePedido->pedidos;
        $pedido->update(['estado' => 'disenio']);


        /**
       mueve la imagen a public storage
         *   $imagen =  $request->file('file')->store('public');
        cambia el nombre de la imagen para poder subirla a una DB
         *   $url = Storage::url($imagen);
         */

        $imagen =  $request->file('file')->store('public');
        // // // $url = Storage::url($imagen);
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


        // // Mail::to('exe@gmail.com')->send(new EstadoMailable);

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




    /**
     * Método para descargar una imagen a partir de su ID.
     *
     * @param int $id - El ID de la imagen que se desea descargar.
     * @return \Illuminate\Http\Response - Una respuesta HTTP que contiene la imagen para su descarga.
     */
    public function descargar($id)
    {
        // Paso 1: Obtener la URL de la imagen a partir del ID proporcionado.
        $img = Disenio::where('id', $id)->value('url_imagen');

        // Paso 2: Crear la URL completa a la ubicación de la imagen en el servidor.
        $url_full = "D:\TF-SGPO\Sist-Oliva\public" . $img;

        // Paso 3: Generar una respuesta HTTP que permite la descarga de la imagen.
        return response()->download($url_full);
    }

    public function show_disenio($id)
    {
        $detalle=DetallePedido::find($id);
        $disenio = $detalle->disenio;
        return view('disenio.indexCliente', compact('disenio'));
    }
    public function preguntas(Request $request)
    {
        //logica necesaria para almacenar las preguntas
        $disenio=Disenio::find($request->disenio_id);
        $pedido=$disenio->detallePedido->pedidos;
        if ($request->pregunta4) {
            //logica necesaria para realizar la aceptacion del diseño
            //1 producto un pedido
            $pedido->update(['estado'=>'produccion']);
            //notificar al cliente
            //notificar a gerencia
            
        } else {

            //logica necesaria para tratar el rechazo del diseño
        }


    
        return $request;

    }
    /**
     Codigo comentado Revisar
     
    public function store(Request $request)
{
    // Recibe un objeto de solicitud ($request)

    // Guarda la imagen recibida en una carpeta
    $imagen = $request->file('file')->store('public');

    // Inicializa las variables
    $url_imagen = null; // La imagen aún no está disponible
    $url_disenio = Storage::url($imagen); // URL de la imagen almacenada en la carpeta 'public'
    $diseno_estado = true;

    // Crea un nuevo registro de diseño en la base de datos
    Disenio::create([
        'detallePedido_id' => 7, // Se asume un valor fijo (debería asignarse correctamente)
        'url_imagen' => $url_imagen,
        'url_disenio' => $url_disenio,
        'disenio_estado' => $diseno_estado
    ]);

    // Envía un correo electrónico a la dirección 'exe@gmail.com' utilizando la clase Mail y el mailable EstadoMailable
    Mail::to('exe@gmail.com')->send(new EstadoMailable);

    // Redirige al usuario a la ruta 'disenios.index'
    return redirect()->route('disenios.index');
}

    public function update(Request $request, $id)
{
    // Recibe un objeto de solicitud ($request) y el ID del diseño que se desea actualizar

    // Guarda la imagen recibida en la carpeta 'public'
    $imagen = $request->file('file')->store('public');

    // Inicializa las variables
    $url_imagen = null; // La imagen aún no está disponible
    $url_disenio = Storage::url($imagen); // URL de la imagen almacenada en la carpeta 'public'
    $diseno_estado = true;

    // Verifica si se cargó una nueva imagen
    if ($imagen != null) {
        // Encuentra el diseño correspondiente en la base de datos utilizando el ID
        $disenio = Disenio::find($id);

        // Actualiza el diseño con la nueva URL de la imagen y el nuevo estado
        $disenio->update([
            'url_disenio' => $url_disenio,
            'disenio_estado' => $diseno_estado
        ]);
    }

    // Envía un correo electrónico a la dirección 'exe@gmail.com' utilizando la clase Mail y el mailable EstadoMailable
    Mail::to('exe@gmail.com')->send(new EstadoMailable);

    // Redirige al usuario a la ruta 'disenios.index'
    return redirect()->route('disenios.index');
}

     */
}
