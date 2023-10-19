@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Listado de pedidos</h1>
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
                    <th>Cliente</th>
                    <th>Alias producto</th>
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
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$item->id}}">
                            Detalle de cliente
                          </button></td>
                        {{-- <td><a href="{{route('productos.show',$item->productos_id)}}">{{$item->productos_id}}</a></td> --}}
                        {{-- {{dd($item->cliente->id)}} --}}
                        <td>AA14x15</td>
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

                    <!-- Button trigger modal -->

  
  <!-- Modal -->
  
  <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5>dni:{{$item->cliente->dni}}</h5>
       <h5> nombre:{{$item->cliente->nombre}}</h5>
          <h5>apellido:{{$item->cliente->apellido}}</h5>
       <h5>telefono:{{$item->cliente->telefono}}</h5>
          <h5>correo:{{$item->cliente->correo}}</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>
                  @endforeach
               
            </tbody>
        </table>
    </div>
</div>
@stop

