<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Producto;
use SebastianBergmann\Environment\Runtime;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $pedidos = Pedido::paginate(10)
        $productos = Producto::paginate(10);
        // dd($producto);
        return view('producto.index', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         *  $request->file('file'): Este código asume que en el formulario de la solicitud HTTP 
         * (por ejemplo, un formulario HTML) se ha enviado un archivo con el nombre "file". 
         * $request es un objeto que representa la solicitud HTTP y file('file') obtiene el archivo enviado con ese nombre.
         * ->store('public'): Después de obtener el archivo, se llama al método store('public'). 
         * Esto almacena el archivo en la ubicación especificada en el sistema de archivos de Laravel.
         * En este caso, los archivos se guardarán en el directorio "public" de la aplicación.
         */
        $request->validate([
            'name' => ['required '],
            'price' => ['required '],
            'description' => ['required '],
            'file' => ['required ']

        ]);

        //validar los campos que ingresa



        $imagen =  $request->file('file')->store('public');
        $url = Storage::url($imagen);

        $producto = Producto::create(
            [
                'name' => $request->name,
                'price' => $request->price,
                'slug' => $request->name,
                'description' => $request->description,
                'category_id' => 1,
                'image_path' => $url,
                'alias' => $request->alias
            ]
        );

        return redirect()->route('productos.index');

        //    return $request;
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
        // dd($id);
        $producto = Producto::find($id);
        // dd($producto);
        return view('producto.show', ['producto' => $producto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return view('producto.edit', compact('id'));

        $producto = Producto::find($id);
        return view('producto.edit', ['producto' => $producto]);
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


        if ($request->file('file') == null) {

            // sino $url toma el valor que tenia imagen_path cuando no se actualiza la foto
            $p = Producto::find($request->id);
            $url = $p->image_path;
        } else {
            // si actualiza debe pasar ...
            $imagen =  $request->file('file')->store('public');
            $url = Storage::url($imagen);
        }





        // // // $request->validate([
        // // //     'name' => ['required '],
        // // //     'price' => ['required '],
        // // //     'description' => ['required '],
        // // //     'file' => ['required '],

        // // // ]);

        Producto::find($request->id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'slug' => $request->name,
            'description' => $request->description,
            'category_id' => 1,
            'image_path' => $url,
            'alias' => $request->alias
        ]);

        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        //elimina pero falta la vista 
        // return "borrado";
        return redirect()->route('productos.index');
    }

    //idea manejar con otra funcion la parte del detalle de productos
    public function detalle($id)
    {

        $pro = Producto::find($id);
        $url_imagen = '';
        return view('detalleProducto', compact('pro', 'url_imagen'));
    }
}
