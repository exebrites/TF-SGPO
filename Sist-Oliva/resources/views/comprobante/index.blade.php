@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Listado de comprobante en estado pendiente-pago</h1>
@stop

@section('content')
    {{-- {{dd($comprobantes)}} --}}
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Fecha </th>
                        <th>Nro de comprobante</th>
                        <th>Nro de pedido</th>
                        <th>estado</th>
                        <th>comprobante</th>


                        <th colspan="2"></th>
                    </tr>

                </thead>

                <tbody>
                    @foreach ($comprobantes as $item)
                        <tr>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->pedido->id }}</td>
                            <td>{{ $item->pedido->estado }}</td>
                            <td><a data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                    Ver mas
                                </a></td>

                            {{-- display none cuando haga el primer click --}}




                            {{-- <td width="10px"><a class="btn btn-primary btn btn-sm"
                                    href="{{ route('disenios.edit', $item->id) }}">Editar</a>
                            </td> --}}
                            {{-- <td width="10px">
                                <form action="{{route('disenios.destroy',$item->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button  class="btn btn-danger btn btn-sm" type="submit">borrar</button>
                                </form>
                            </td>  --}}
                        </tr>


                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
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



                                        <div class="row">
                                            <div class="col-md-6">
                                                <img src="{{ $item->url_comprobantes }}" alt="Imagen 1" class="img-fluid">
                                            </div>

                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cerrar</button>
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
