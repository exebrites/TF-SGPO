<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return view('pedido.edit');
        $pedido = Pedido::find($id);
        return view('pedido.edit',['pedido'=>$pedido]);
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
        //
        //   clientes_id', 'productos_id', 'fecha_inicio', 'fecha_entrega', 'estado', 'disenio_estado', 'cantidad','subtotal'];
        return 'actualizar';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //FIN DE FUNCIONES DE GESTIONAR PEDIDO

    // public function procesarPedido(Request $request)
    // {
    //     // nunca va procesar pedido con un carrito en blanco 

    //     //   return \Cart::getSubTotal();

    //     //    'clientes_id','productos_id','fecha_inicio','fecha_entrega','estado','disenio_estado'];

    //     //\Cart::getContent() que retorna?
    //     $producto = \Cart::getContent();
    //     //   dd($producto);
    //     foreach ($producto as $p) {
    //         $pedido = Pedido::create([
    //             'clientes_id' => Auth::user()->id,
    //             'productos_id' => $p->id,
    //             'fecha_inicio' => '2000-02-01',
    //             'fecha_entrega' => '2000-02-01',
    //             'estado' => true,
    //             'disenio_estado' => true,
    //             'cantidad' => $p->quantity,
    //             'subtotal' => \Cart::getSubTotal()

    //         ]);
    //     }

    //     \Cart::clear();
    //     return redirect()->route('shop')->with('success_msg', 'Su pedido se realizó con éxito!');

    //     // 
    // }
}
