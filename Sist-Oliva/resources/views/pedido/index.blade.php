@extends('adminlte::page')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

@section('title')

@section('content_header')
    <h1>Listado de pedidos</h1>
@stop

@section('content')
    {{-- {{dd($pedidos);}} --}}
    <div class="card">
        <div class="card-header">
            {{-- Agregar --}}
            <a href="{{ route('shop') }}" class="btn btn-success">Agregar nuevo pedido</a>
        </div>
        <div class="card-body">

            



            
            <table class="table table-striped" id="pedidos">
                <thead>
                    <tr>
                        <th>Nro de pedido</th>
                        <th>Cliente</th>
                        <th>Alias producto</th>
                        <th>Estado</th>
                        <th>Diseño</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        {{-- <th colspan="2"></th> --}}
                        <th></th>
                    </tr>

                </thead>
                <tbody>

                    @foreach ($pedidos as $item)
                        @foreach ($item->detallePedido as $detalle)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><a data-toggle="modal" data-target="#exampleModal{{ $item->cliente->id }}">
                                        {{ $item->cliente->nombre }}
                                    </a></td>

                                {{-- {{$detalle->disenio->disenio_estado}} --}}

                                <td>
                                    {{-- relacionar objetos --}}
                                    {{ $detalle->producto->alias }}

                                </td>
                                <td>{{ $item->estado }}</td>

                                {{-- Condicional de dos opciones disenio_estado(0,1). Indicando si tiene o no un diseño --}}
                                <td>{{ $detalle->disenio->disenio_estado == 1 ? 'TIENE' : 'NO TIENE' }}</td>

                                <td>{{ $detalle->cantidad }}</td>
                                <td>{{ $detalle->subtotal }}</td>


                                <td width="10px"><a class="btn btn-primary btn btn-sm"
                                        href="{{ route('pedidos.edit', $item->id) }}">Editar</a></td>
                                {{-- BOTON DE BORRAR - cambiar estado del pedido -> activo/inactivo 
                            
                            <td width="10px">
                            <form action="{{route('pedidos.destroy',$item->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button  class="btn btn-danger btn btn-sm" type="submit">borrar</button>
                            </form>
                        </td> --}}

                            </tr>

                            <!-- Button trigger modal -->


                            <!-- Modal Clientes-->

                            <div class="modal fade" id="exampleModal{{ $item->cliente->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>dni:{{ $item->cliente->dni }}</h5>
                                            <h5> nombre:{{ $item->cliente->nombre }}</h5>
                                            <h5>apellido:{{ $item->cliente->apellido }}</h5>
                                            <h5>telefono:{{ $item->cliente->telefono }}</h5>
                                            <h5>correo:{{ $item->cliente->correo }}</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach

                </tbody>
            </table>




















        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        new DataTable('#pedidos');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

@stop
