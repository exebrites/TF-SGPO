<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

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
        //$Product = Product::find($productId); // assuming you have a Product model with id, name, description & price
        //$rowId = 456; // generate a unique() row ID
        //$userID = 2;  the user ID to bind the cart contents

      /**  
       * ¿Como recupero el usuario que actual? 
       * 
       * */

        // add the product to cart
        // \Cart::session($userID)->add(array(
        //     'id' => $rowId,
        //     'name' => $Product->name,
        //     'price' => $Product->price,
        //     'quantity' => 4,
        //     'attributes' => array(),
        //     'associatedModel' => $Product
        // ));


/**
 * 

 FUNCIONAMIENTO CORRECTO
*/
        // \Cart::add(array(
        //     'id' => $request->id,
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'quantity' => $request->quantity,
        //     'attributes' => array(
        //         'imagen_path' => $request->img,
        //         'slug' => $request->slug
        //     )
        // ));

        // return redirect()->route('cart.index')->with('success_msg', 'Producto agregado a su Carrito!');
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
}
