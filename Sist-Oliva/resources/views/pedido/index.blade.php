@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Lsitado de pedidos</h1>
@stop

@section('content')
   {{-- {{dd($pedidos);}} --}}
<div class="card">
    <div class="card-header">
        {{-- Agregar --}}
        <a   href="{{route('pedidos.create')}}" class="btn btn-success" >Agregar nuevo producto</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nro de pedido</th>
                    <th>Producto</th>
                    <th>Cliente</th>
                   
                    <th colspan="2"></th> 
                </tr>
                
            </thead>
            <tbody>
        
                 @foreach ($pedidos as $item)
                   {{-- {{dd($item)}} --}}
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->clientes_id}}</td>
                        <td>{{$item->productos_id}}</td>
                        <td width="10px"><a class="btn btn-primary btn btn-sm" href="{{route('pedidos.edit',$item->id)}}">Editar</a></td>
                        <td width="10px">
                            <form action="{{route('pedidos.destroy',$item->id)}}" method="post">
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

