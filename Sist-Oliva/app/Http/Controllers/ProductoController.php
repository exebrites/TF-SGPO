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

        $productos = Producto::all();
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
        //validar los campos que ingresa
        $imagen =  $request->file('file')->store('public');
        $url = Storage::url($imagen);

        Producto::create(
            [
                'name' => $request->name,
                'price' => $request->price,
                'slug' => $request->name,
                'description' => $request->description,
                'category_id' => 1,
                'image_path' => $url
            ]
        );

        //   return redirect()->route('productos.edit',['producto'=>$producto]);
        // return view('producto.edit', ['producto' => $producto]);
        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $id)
    {
        //
        // dd($id);
        // $producto = Producto::find($id);
        // dd($producto);
        // return view('producto')->with(['producto' => $producto]);
        return $id;
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
        // $producto=Producto::updated()
        // return view('producto.edit', ['producto' => $producto]);

        /*ERROR AL ACTUALIZAR*/
        $producto = Producto::find($request->id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'slug' => $request->name,
            'description' => $request->description, //recibir de file.store la URL
            'category_id' => 1,
            'image_path' => 'cosito'
        ]);
        // actualiza pero falta el la vista
        // return $producto;
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

        return view('detalleProducto', ['pro' => $pro]);
    }
}
