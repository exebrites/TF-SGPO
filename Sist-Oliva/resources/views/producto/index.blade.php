@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Productos</h1>
@stop

@section('content')
{{-- {{dd($productos);}} --}}
<div class="card">
    <div class="card-header">
        {{-- Agregar --}}
        <a   href="{{route('productos.create')}}" class="btn btn-success" >Agregar nuevo producto</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th colspan="2"></th> 
                </tr>
                
            </thead>
            <tbody>
        
                 @foreach ($productos as $item)
                    {{-- {{dd($item);}} --}}
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td width="10px"><a class="btn btn-primary btn btn-sm" href="{{route('productos.edit',$item->id)}}">Editar</a></td>
                        <td width="10px">
                            <form action="{{route('productos.destroy',$item->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button  class="btn btn-danger btn btn-sm" type="submit">borrar</button>
                            </form>
                        </td>
                
                    </tr>
                  @endforeach
               
            </tbody>
        </table>
    </div>
</div>
   
@stop