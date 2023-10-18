@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Editar producto</h1>
@stop

@section('content')
{{-- {{dd($producto);}} --}}


<div class="card">
    <div class="card-body">
      <form action="{{route('productos.update',$producto)}}" method="post" >
        @csrf
        @method('PUT')
        <div class="form-group">
          <label >identificador</label>
          <input type="text" class="form-control" aria-describedby="emailHelp" value="{{$producto->id}}" name="id" readonly>
        </div>
        <div class="form-group">
              <label >Nombre</label>
              <input type="text" class="form-control" aria-describedby="emailHelp" value="{{$producto->name}}" name="name">
              @error('name')
              <br>
              <small style="color:red">{{$message}}</small>
          @enderror
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Precio</label>
              <input type="text" class="form-control"  value="{{$producto->price}}" name="price">
              @error('price')
              <br>
              <small style="color:red">{{$message}}</small>
          @enderror
            </div>

            
            <div class="form-group">
                <label for="exampleInputPassword1">Descripcion</label>
                <input type="text" class="form-control" value="{{$producto->description}}" name="description">
                @error('description')
                <br>
                <small style="color:red">{{$message}}</small>
            @enderror
              </div>
          
              <div class="card-body">
                <img src="{{$producto->image_path}}" alt="" srcset="">
              </div>

       
            <div class="form-group">
              <label>Seleccionar imagen</label>
              <input type="file" class="form-control-file" value="{{$producto->image_path}}"  name="file" >
              
            </div>
         

          <button type="submit" class="btn btn-primary">Actualizar Producto</button>
        </form>
      
      <a class="btn btn-danger" href="http://">Cancelar</a>
    </div>
   </div>

@stop