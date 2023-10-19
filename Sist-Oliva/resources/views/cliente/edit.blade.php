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
           <div class="form-group" style="display:none">
          <label >ID</label>
          <input type="text" class="form-control" name="id" value="{{$cliente->id}}" readonly>
          </div>
           <div class="form-group">
              <label >Nro documento</label>
              <input type="text" class="form-control" name="dni" value="{{$cliente->dni}}">
            </div>
            <div class="form-group">
              <label >Nombre</label>
              <input type="text" class="form-control" name="nombre" value="{{$cliente->nombre}}">
            </div>
            <div class="form-group">
              <label >Apellido</label>
              <input type="text" class="form-control" name="apellido" value="{{$cliente->apellido}}">
            </div>
            <div class="form-group">
              <label >Telefono</label>
              <input type="text" class="form-control" name="telefono" value="{{$cliente->telefono}}">
            </div>
            <div class="form-group">
              <label >Correo electronico</label>
              <input type="text" class="form-control" name="correo" value="{{$cliente->correo}}">
            </div>

          <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>      
        <a class="btn btn-danger" href="{{route('clientes.index')}}">Cancelar</a>
      
    </div>
   </div>
@stop

