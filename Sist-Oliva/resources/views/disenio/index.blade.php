@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Listado de Diseños</h1>
@stop

@section('content')
    {{-- {{dd($disenios)}}
    {{dd($pedidos)}} --}}
    <a class="btn btn-success" href="{{ route('disenios.create') }}">Subir un nuevo diseño</a>

    {{-- //listado de Diseños
Diseño, Su estado y El pedido al que esta asociado  y el producto --}}
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>

                        {{-- <th>Nro de pedido</th> --}}
                        <th>Nro de diseño</th>
                        {{-- <th>Estado del diseño</th>


                        <th>Alias del producto</th> --}}
                        <th>Ver diseño</th>
                        <th colspan="2"></th>
                    </tr>

                </thead>

                <tbody>
                    @foreach ($disenios as $item)
                        <tr>
                            {{-- <td>{{ $pedidos[0]->id }}</td> --}}
                            <td>{{ $item->id }}</td>
                            {{-- <td>{{ $pedidos[0]->disenio_estado ? 'Tiene' : 'no tiene' }}</td>
                            <td>{{ $pedidos[0]->producto->alias }}</td> --}}
                            <td><a data-toggle="modal" data-target="#exampleModal{{$item->id}}">
                                    Imagen
                                </a></td>

                                {{-- display none cuando haga el primer click --}}
                            



                            <td width="10px"><a class="btn btn-primary btn btn-sm"
                                    href="{{ route('disenios.edit', $item->id) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('disenios.destroy',$item->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button  class="btn btn-danger btn btn-sm" type="submit">borrar</button>
                                </form>
                            </td>
                        </tr>


                        <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1"
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
                                        <img src="{{$item->url}}" alt="Imagen de diseño" srcset="">
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
