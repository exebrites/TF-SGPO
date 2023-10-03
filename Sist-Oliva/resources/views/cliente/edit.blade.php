@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Editar un cliente</h1>
@stop

@section('content')
 {{-- {{dd($cliente)}}  


{{-- Como hacer para traer los datos --}}
   <div class="card">
    <div class="card-body">
      <form action="{{route('clientes.update',$cliente)}}" method="post" >
        @csrf
        @method('PUT')
          <div class="form-group">
            <label>id</label>
            <input type="text" class="form-control" name="id" value={{$cliente->id}}>
          </div>
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" class="form-control" name="nombre" value={{$cliente->nombre}}>
            </div>
         

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      
   <a href="{{route('clientes.index')}}" class="btn btn-danger">Cancelar</a>
    </div>
   </div>
@stop
