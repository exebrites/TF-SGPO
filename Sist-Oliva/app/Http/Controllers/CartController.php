<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pedido;
use App\Models\Producto;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class CartController extends Controller
{
    public function shop()
    {
        $products = Producto::paginate(10);
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

    public function subirImagen(Request $request) //NUEVO
    {


        // Aplica reglas de validación
        $validator = Validator::make($request->all(), [
            'imagen' => 'required|image|mimes:jpeg,png,jpg|dimensions:max=2048', // Ajusta las extensiones y el tamaño máximo según tus necesidades
        ]);

        // Verifica si las reglas de validación han sido cumplidas
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Sube el archivo recibido en la solicitud con el nombre 'file' al directorio 'public' del sistema de archivos de Laravel.
        $imagen = $request->file('imagen')->store('public');

        // Obtiene la URL pública del archivo recién almacenado utilizando el servicio Storage de Laravel.
        $url_imagen = Storage::url($imagen);
        return redirect()->back()->with('success', 'Imagen subida exitosamente.')->with('url_imagen', $url_imagen);
    }
    public function add(Request $request)
    {

        // Aplica reglas de validación
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpeg,png,jpg|dimensions:max=2048', // Ajusta las extensiones y el tamaño máximo según tus necesidades
        ]);

        // Verifica si las reglas de validación han sido cumplidas
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Sube el archivo recibido en la solicitud con el nombre 'file' al directorio 'public' del sistema de archivos de Laravel.
        $imagen = $request->file('file')->store('public');

        // Obtiene la URL pública del archivo recién almacenado utilizando el servicio Storage de Laravel.
        $url_imagen = Storage::url($imagen);
        //agrega el producto y su diseño al carrito
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'imagen_path' => $request->img,
                'slug' => $request->slug,
                'url_disenio' => $url_imagen,
                'estado_disenio' => true
            )
        ));

        return redirect()->route('cart.index')->with('success_msg', 'Producto agregado a su Carrito!');

        // return     $url_disenio;
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
