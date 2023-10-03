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
        {{-- <a   href="{{route('pedidos.create')}}" class="btn btn-success" >Agregar nuevo producto</a> --}}
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nro de pedido</th>
                    <th>Cliente</th>
                    <th>Producto</th>
                    <th>Estado</th>
                    <th>Diseño</th>

                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th colspan="2"></th> 
                </tr>
                
            </thead>
            <tbody>
        
                 @foreach ($pedidos as $item)
                   {{-- {{dd($item)}} --}}
                    <tr>
                        <td>{{$item->id}}</td>
                        <td><a href="{{route('clientes.show',$item->clientes_id)}}">{{$item->clientes_id}}</a></td>
                        <td><a href="{{route('productos.show',$item->productos_id)}}">{{$item->productos_id}}</a></td>

                        <td>En proceso/Terminado</td>
                        <td>Si/No</td>
                        <td>{{$item->cantidad}}</td>
                        <td>{{$item->subtotal}}</td>
                        <td width="10px"><a class="btn btn-primary btn btn-sm" href="{{route('pedidos.edit',$item->id)}}">Editar</a></td>
                        {{--BOTON DE BORRAR - cambiar estado del pedido -> activo/inactivo 
                            
                            <td width="10px">
                            <form action="{{route('pedidos.destroy',$item->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button  class="btn btn-danger btn btn-sm" type="submit">borrar</button>
                            </form>
                        </td> --}}
                
                    </tr>
                  @endforeach
               
            </tbody>
        </table>
    </div>
</div>
@stop

