@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Editar producto</h1>
@stop

@section('content')
{{-- {{dd($producto);}} --}}


{{-- Como hacer para traer los datos --}}
<div class="card">
    <div class="card-body">
      <form action="{{route('productos.update',$producto)}}" method="post" >
        @csrf
        @method('PUT')
        <div class="form-group">
          <label >identificador</label>
          <input type="text" class="form-control" aria-describedby="emailHelp" value="{{$producto->id}}" name="id">
        </div>
        <div class="form-group">
              <label >Nombre</label>
              <input type="text" class="form-control" aria-describedby="emailHelp" value="{{$producto->name}}" name="name">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Precio</label>
              <input type="text" class="form-control"  value="{{$producto->price}}" name="price">
            </div>

            
            <div class="form-group">
                <label for="exampleInputPassword1">Descripcion</label>
                <input type="text" class="form-control" value="{{$producto->description}}" name="description">
              </div>
          
              <div class="card-body">
                <img src="{{$producto->image_path}}" alt="" srcset="">
              </div>

       
            <div class="form-group">
              <label>Seleccionar imagen</label>
              <input type="file" class="form-control-file" value="{{$producto->image_path}}"  name="file" >
            </div>
         

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      
      <a class="btn btn-danger" href="http://">Cancelar</a>
    </div>
   </div>

@stop