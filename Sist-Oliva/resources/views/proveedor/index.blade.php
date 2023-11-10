@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Pagina de proveedores</h1>
@stop

@section('content')

    {{-- {{dd($proveedores);}} --}}
    <div class="card">
        <div class="card-header">
            {{-- Agregar --}}
            <a href="{{ route('proveedores.create') }}" class="btn btn-success">Agregar nuevo producto</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre empresa</th>
                        <th>Nombre contacto</th>
                        <th>CUIT</th>
                        <th>telefono</th>
                        <th>Correo</th>
                        <th colspan="2"></th>
                    </tr>

                </thead>
                <tbody>

                    @foreach ($proveedores as $item)
                        {{-- {{ dd($item) }} --}}
                        <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->nombre_empresa}}</td>
                        <td>{{$item->nombre_contacto}}</td>
                        <td>{{$item->cuit}}</td>
                        <td>{{$item->telefono}}</td>
                        <td>{{$item->correo}}</td>

                        <td>
                        <!-- Button trigger modal -->
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$item->id}}">
                                ver imagen  </button>                            
                        </td>--}}
                        
                        <td width="10px"><a class="btn btn-primary btn btn-sm" href="{{route('proveedores.edit',$item->id)}}">Editar</a></td>
                        <td width="10px">
                            <form action="{{route('proveedores.destroy',$item->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button  class="btn btn-danger btn btn-sm" type="submit">borrar</button>
                            </form>
                        </td>
                       
                
                    </tr>

                    {{-- <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">{{$item->name}}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">  --}}
                        {{-- --}}
                        {{-- <img src="{{$item->image_path}}" class="img-fluid" alt="...">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                        {{-- </div>
                          </div>
                        </div>
                      </div> --}}
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>


@stop
