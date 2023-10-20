<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\User;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function shop()
    {
        $products = Producto::all();
        //dd($products);
        return view('shop')->with(['products' => $products]);
    }

    public function cart()
    {
        $cartCollection = \Cart::getContent();
        //dd($cartCollection);
        return view('cart')->with(['cartCollection' => $cartCollection]);;
    }
    public function remove(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Producto removido!');
    }

    public function add(Request $request)
    {
        /**
         * 

 FUNCIONAMIENTO DE PRUEBA
         */
        // $Producto = Producto::find(2); // assuming you have a Product model with id, name, description & price
        // //$rowId = 456; // generate a unique() row ID
        // $userID = 1;  //the user ID to bind the cart contents

        // /**  
        //  * ¿Como recupero el usuario que actual? 
        //  * 
        //  * */
        // $userID = auth()->user()->id;
        // // add the product to cart
        // \Cart::session($userID)->add(array(
        //     'id' => $Producto->id,
        //     'name' => $Producto->name,
        //     'price' => $Producto->price,
        //     'quantity' => 4,
        //     'attributes' => array(
        //         'imagen_path' => $Producto->img,
        //         'slug' => $Producto->slug
        //     ),
        //     'associatedModel' => $Producto
        // ));


        /**
         * 

 FUNCIONAMIENTO CORRECTO
         */
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'imagen_path' => $request->img,
                'slug' => $request->slug
            )
        ));

        return redirect()->route('cart.index')->with('success_msg', 'Producto agregado a su Carrito!');
    }

    public function update(Request $request)
    {
        \Cart::update(
            $request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
            )
        );
        return redirect()->route('cart.index')->with('success_msg', 'Carrito actualizado!');
    }

    public function clear()
    {
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Carrito borrado!');
    }
    public function procesarPedido(Request $request)
    {
        // nunca va procesar pedido con un carrito en blanco 

        //   return \Cart::getSubTotal();

        //    'clientes_id','productos_id','fecha_inicio','fecha_entrega','estado','disenio_estado'];

        //\Cart::getContent() que retorna?
        $producto = \Cart::getContent();
        //   dd($producto);
        foreach ($producto as $p) {
            $pedido = Pedido::create([
                'clientes_id' => Auth::user()->id,
                'productos_id' => $p->id,
                'fecha_inicio' => '2000-02-01',
                'fecha_entrega' => '2000-02-01',
                'estado' => "pendiente-pago", //por defecto: pendiente-pago
                'disenio_estado' => false, //por defecto: no tiene pedido = false
                'cantidad' => $p->quantity,
                'subtotal' => \Cart::getSubTotal()

            ]);
        }

        \Cart::clear();
        return redirect()->route('shop')->with('success_msg', 'Su pedido se realizó con éxito!');

        // 
    }
}
