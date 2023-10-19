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
                    <th>Alias</th> 
                    <th>Precio</th>
                    <th>Especificacion</th>
                    <th>Imagen</th>
                    <th colspan="2"></th> 
                </tr>
                
            </thead>
            <tbody>
        
                 @foreach ($productos as $item)
                    {{-- {{dd($item);}} --}}
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->alias}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                            <!-- Button trigger modal -->
                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$item->id}}">
                                ver imagen  </button>                            
                        </td>
                        
                        <td width="10px"><a class="btn btn-primary btn btn-sm" href="{{route('productos.edit',$item->id)}}">Editar</a></td>
                        <td width="10px">
                            <form action="{{route('productos.destroy',$item->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button  class="btn btn-danger btn btn-sm" type="submit">borrar</button>
                            </form>
                        </td>
                       
                
                    </tr>

                    <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">{{$item->name}}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                {{-- --}}
                                <img src="{{$item->image_path}}" class="img-fluid" alt="...">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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