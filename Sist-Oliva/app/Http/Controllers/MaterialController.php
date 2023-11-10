<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiales = Material::all();
        return view('material.index', compact('materiales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('material.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;

        // id integer pk
        // nombre string
        // descripcion string
        // cod_interno string
        // stock string
        // unidad_medida string
        // fecha_adquisicion date
        // fecha_vencimiento date
        // notas string
        Material::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'cod_interno' => $request->cod,
            'stock' => $request->stock,
            'unidad_medida' => $request->medida,
            'fecha_adquisicion' => $request->f_adquisicion,
            'fecha_vencimiento' => $request->f_vencimiento,
            'notas' => $request->notas,

        ]);
        return redirect()->route('materiales.index');
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
        $material = Material::find($id);
        return view('material.edit', compact('material'));
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


        // id integer pk
        // nombre string
        // descripcion string
        // cod_interno string
        // stock string
        // unidad_medida string
        // fecha_adquisicion date
        // fecha_vencimiento date
        // notas string


        // 'nombre' => $request->nombre,
        // 'descripcion' => $request->descripcion,
        // 'cod_interno' => $request->cod,
        // 'stock' => $request->stock,
        // 'unidad_medida' => $request->medida,
        // 'fecha_adquisicion' => $request->f_adquisicion,
        // 'fecha_vencimiento' => $request->f_vencimiento,
        // 'notas' => $request->notas,
        Material::find($request->id)->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'cod_interno' => $request->cod,
            'stock' => $request->stock,
            'unidad_medida' => $request->medida,
            'fecha_adquisicion' => $request->f_adquisicion,
            'fecha_vencimiento' => $request->f_vencimiento,
            'notas' => $request->notass

        ]);
        return redirect()->route('materiales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $material = Material::find($id);
        $material->delete();

        return redirect()->route('materiales.index');
    }
}
