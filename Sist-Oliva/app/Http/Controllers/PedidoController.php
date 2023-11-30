<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Disenio;
use Darryldecode\Cart\Cart;
use App\Mail\EstadoMailable;
use Illuminate\Http\Request;
use App\Models\DetallePedido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedido.index', ['pedidos' => $pedidos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pedido.create');
    }


    public function edit($id)
    {
        // return view('pedido.edit');
        $pedido = Pedido::find($id);
        return view('pedido.edit', ['pedido' => $pedido]);
    }


    //FIN DE FUNCIONES DE GESTIONAR PEDIDO

    public function procesarPedido(Request $request)
    {

        // return $request;

        // nunca va procesar pedido con un carrito en blanco 
        // $ultimoId = Disenio::max('id');
        // //    return \Cart::getSubTotal();
        // $disenio_estado = Disenio::where('id',  $ultimoId)->value('disenio_estado');

        //    'clientes_id','productos_id','fecha_inicio','fecha_entrega','estado','disenio_estado'];

        //\Cart::getContent() que retorna?
        $producto = \Cart::getContent();




        //creando un pedido que tiene un cliente asociado

        Pedido::create([
            'clientes_id' => Auth::user()->id,


            'fecha_inicio' => null,
            'fecha_entrega' => null,
            'estado' => "pendiente-pago", //por defecto: pendiente-pago


        ]);
        // \Cart::clear();
        $id = Pedido::max('id');
        // dd($id);



        return redirect()->route('pedido-detallePedido', ['id' => $id]);
    }

    public function pedidoCliente()
    {

        $user = Auth::user()->id;
        $cliente = Cliente::find($user);
        //    dd($cliente);
        $pedidos = Pedido::where('clientes_id', $cliente->id)->get();


        return view('pedido.pedidoCliente', ['pedidos' => $pedidos]);
    }
    public function detallePedido(Request $request)
    {

        //asocio un pedido , un producto a un detallePedido
        $id = $request->id;
        $estado = Pedido::where('id', $id)->value('estado');
        $producto = \Cart::getContent();
        // dd($producto);
        foreach ($producto as $p) {
            $idPr = $p->id;
            detallePedido::create([
                'pedido_id' => $id,
                'producto_id' => $idPr,
                'cantidad' => $p->quantity,
                'subtotal' => \Cart::get($idPr)->getPriceSum(),
                'produccion' => false
            ]);
            $idDP = detallePedido::max('id');
            // dd($p->attributes->url_disenio);
            // $imagen =  $request->file('file')->store('public');
            // $url_imagen = Storage::url($imagen);

            $url_imagen = $p->attributes->url_disenio;
            Disenio::create([
                'detallePedido_id' => $idDP,
                'url_imagen' => $url_imagen,
                'url_disenio' => "",
                'disenio_estado' => 1,
                'revision' => 0
            ]);
        }
        $total = \Cart::getTotal();
        // dd($total);
        \Cart::clear();

        return redirect()->route('pago', ['id' => $id, 'estado' => $estado, 'total' =>  $total]);
        // return redirect()->route('checkout.index')->with('success_msg', 'Su pedido se realizó con éxito!');
    }

    public function update(Request $request, $id)
    {
        // Recibe un objeto de solicitud ($request) y el ID del pedido que se desea actualizar

        // Encuentra el pedido correspondiente en la base de datos utilizando el ID
        $pedido = Pedido::find($id);

        // Actualiza el estado del pedido con el valor proporcionado en la solicitud
        $pedido->update([
            'estado' => $request->estado,
            // 'disenio_estado' => $request->disenio
        ]);

        // Envía un correo electrónico a la dirección 'exe@gmail.com' utilizando la clase Mail y el mailable EstadoMailable
        Mail::to('exe@gmail.com')->send(new EstadoMailable);

        // Redirige al usuario a la ruta 'pedidos.index'
        return redirect()->route('pedidos.index');
    }

    /**
     Codigo comentado Revisar

 

    public function procesarPedido(Request $request)
{
    // Recibe un objeto de solicitud ($request)

    // Obtiene los productos en el carrito utilizando la librería Cart
    $producto = \Cart::getContent();

    // Crea un nuevo pedido asociado al cliente autenticado
    Pedido::create([
        'clientes_id' => Auth::user()->id,
        'fecha_inicio' => null, // Establece la fecha de inicio como nula
        'fecha_entrega' => null, // Establece la fecha de entrega como nula
        'estado' => "pendiente-pago", // Por defecto, establece el estado como "pendiente-pago"
    ]);

    // Obtiene el ID del pedido recién creado
    $id = Pedido::max('id');

    // Redirige al usuario a la ruta 'pedido-detallePedido' con el ID del pedido
    return redirect()->route('pedido-detallePedido', ['id' => $id]);
}
    public function pedidoCliente()
{
    // Obtiene el ID del usuario autenticado
    $user = Auth::user()->id;

    // Busca un registro de cliente con el mismo ID que el usuario autenticado
    $cliente = Cliente::find($user);

    // Busca todos los pedidos asociados al cliente
    $pedidos = Pedido::where('clientes_id', $cliente->id)->get();

    // Retorna la vista 'pedido.pedidoCliente' con la colección de pedidos
    return view('pedido.pedidoCliente', ['pedidos' => $pedidos]);
}

public function detallePedido(Request $request)
{
    // Recibe un objeto de solicitud ($request)

    // Obtiene el ID del pedido a través de la solicitud
    $id = $request->id;

    // Obtiene el estado del pedido asociado a ese ID
    $estado = Pedido::where('id', $id)->value('estado');

    // Obtiene los productos en el carrito utilizando la librería Cart
    $producto = \Cart::getContent();

    // Recorre todos los productos en el carrito
    foreach ($producto as $p) {
        // Obtiene el ID del producto
        $idPr = $p->id;

        // Crea un nuevo detalle de pedido asociado al pedido actual
        detallePedido::create([
            'pedido_id' => $id,
            'producto_id' => $idPr,
            'cantidad' => $p->quantity,
            'subtotal' => \Cart::get($idPr)->getPriceSum()
        ]);

        // Obtiene el ID del detalle de pedido recién creado
        $idDP = detallePedido::max('id');

        // Obtiene la URL de la imagen del diseño del producto desde los atributos del producto
        $url_imagen = $p->attributes->url_disenio;

        // Crea un registro de diseño asociado al detalle de pedido
        Disenio::create([
            'detallePedido_id' => $idDP,
            'url_imagen' => $url_imagen,
            'url_disenio' => null,
            'disenio_estado' => 1
        ]);
    }

    // Obtiene el total del carrito
    $total = \Cart::getTotal();

    // Limpia el carrito
    \Cart::clear();

    // Redirige al usuario a la ruta 'pago' con el ID del pedido, el estado y el total
    return redirect()->route('pago', ['id' => $id, 'estado' => $estado, 'total' => $total]);
}


     */
}
