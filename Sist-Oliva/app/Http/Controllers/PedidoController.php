<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Disenio;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('pedido.edit', ['pedido' => $pedido]);
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
        $pedido = Pedido::find($id);
        $pedido->update([
            'estado' => $request->estado,
            'disenio_estado' => $request->disenio
        ]);
        return redirect()->route('pedidos.index');
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
      
        foreach ($producto as $p) {
            Pedido::create([
                'clientes_id' => Auth::user()->id,
                'productos_id' => $p->id,
                'disenios_id' =>  1,
                'fecha_inicio' => null,
                'fecha_entrega' => null,
                'estado' => "pendiente-pago", //por defecto: pendiente-pago
                'disenio_estado' =>   null, //por defecto: no tiene pedido = false
                'cantidad' => null,//$p->quantity,
                'subtotal' => null//\Cart::getSubTotal()

            ]);
        }
        \Cart::clear();
        return redirect()->route('checkout.index')->with('success_msg', 'Su pedido se realizó con éxito!');

        // // 
    }

    public function pedidoCliente(){

        $user = Auth::user()->id;
        $cliente = Cliente::find($user);
        //    dd($cliente);
        $pedidos = Pedido::where('clientes_id', $cliente->id)->get();
       
       
        return view('pedido.pedidoCliente',['pedidos'=>$pedidos]);
    }
}
