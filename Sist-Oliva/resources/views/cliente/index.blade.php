@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Listado de clientes</h1>
@stop

@section('content')
{{-- {{dd($clientes)}} --}}
<div class="card">
    <div class="card-header">
        {{-- 

            !!Es posible agregar un nuevo cliente? Estos se registran atreves de la web (?
            
            --}}
        {{-- <a  href="{{route('clientes.create')}}"  class="btn btn-success" >Agregar nuevo cliente</a> --}}
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
     {{-- /*implementar para el listado de clientes*/ --}}

                 @foreach ($clientes as $item)
                     {{-- {{dd($item);}}   --}}
                    <tr>
                       
                        <td> {{$item->id}} </td>
                       
                        <td> {{$item->nombre}}</td>

                        {{-- en el boton editr--}}
                        <td width="10px"><a  href="{{route('clientes.edit',$item->id)}}" class="btn btn-primary btn btn-sm">Editar</a></td>
                        <td width="10px">
                            {{-- en action  --}}
                            <form action="{{route('clientes.destroy',$item->id)}}" method="post">
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
