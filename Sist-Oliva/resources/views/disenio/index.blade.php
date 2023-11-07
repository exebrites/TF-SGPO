@extends('adminlte::page')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


@section('title')

@section('content_header')
    <h1>Listado de Diseños</h1>
@stop

@section('content')
    {{-- {{ dd($disenios) }} --}}
    {{-- {{dd($pedidos)}} --}}
    {{-- <a class="btn btn-success" href="{{ route('disenios.create') }}">Subir un nuevo diseño</a> --}}

    {{-- //listado de Diseños
Diseño, Su estado y El pedido al que esta asociado  y el producto --}}

    <div class="accordion" id="accordionExample">

        @foreach ($pedidos as $item)
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo{{ $item->id }}" aria-expanded="false" aria-controls="collapseTwo">
                        Nro de pedido: {{ $item->id }}{{-- <br> Estado: {{ $item->estado }} --}}
                    </button>
                </h2>

                <div id="collapseTwo{{ $item->id }}" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    {{-- <th>Nro de pedido</th> --}}
                                    <th>Producto</th>
                                    {{-- <th>Nro de diseño</th> --}}
                                    <th>Estado diseño</th>
                                    <th>imagen de diseño</th>
                                    {{-- <th>diseño</th> --}}

                                    {{-- <th>estado</th> --}}

                                    <th colspan="2"></th>
                                </tr>

                            </thead>

                            <tbody>
                                {{-- {{ dd($item->detallePedido[]->disenio) }} --}}
                                @foreach ($item->detallePedido as $detalle)
                                    <tr>

                                        {{-- <th scope="row">1</th> --}}
                                        {{-- $p->detallePedido[0]->disenio->disenio_estado --}}
                                        <td>{{ $detalle->producto->name }}</td>
                                        <td>{{ $detalle->disenio->disenio_estado ? 'Tiene' : 'no tiene' }}</td>
                                        <td><a data-toggle="modal" data-target="#exampleModal{{ $detalle->disenio->id }}">
                                                Imagen de diseño

                                            </a></td>
                                        <td width="10px"><a class="btn btn-primary btn btn-sm"
                                                href="{{ route('disenios.edit', $detalle->disenio->id) }}">Editar</a>
                                        </td>
                                        {{-- <td width="10px">
                                            <form action="{{ route('disenios.destroy', $detalle->disenio->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn btn-sm" type="submit">borrar</button>
                                            </form>
                                        </td> --}}

                                    </tr>

                                    <div class="modal fade" id="exampleModal{{ $detalle->disenio->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <img src="{{ $detalle->disenio->url_imagen }}" class="img-fluid"
                                                        alt="Imagen de diseño" srcset=""><br>
                                                    <a href="{{ route('disenios.descargar', $detalle->disenio->id) }}">Descargar
                                                        imagen
                                                    </a>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cerrar</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- @foreach ($disenios as $item)
                                <tr>
                                    {{-- <td>{{ dd($item->pedidos->id)}}</td> --}}
                                {{-- <td>{{ $item->id }}</td> --}}
                                {{-- <td>{{ $item->pedido->disenio_estado ? 'Tiene' : 'no tiene' }}</td> --}}
                                {{-- <td>{{$item->pedido->producto->alias }}</td> 
                                    <td><a data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                            Imagen de diseño
        
                                        </a></td> --}}

                                {{-- display none cuando haga el primer click --}}
                                {{-- <td>{{ $item->disenio_estado = 1 ? 'Tiene' : 'no tiene ' }}</td>
        
        
        
        
                                   
                                </tr>
        --}}
                                {{--
                            @endforeach  --}}




                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>

    @stop
