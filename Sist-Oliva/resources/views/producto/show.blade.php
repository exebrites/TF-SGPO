@extends('adminlte::page')

@section('title')

@section('content_header')
<h1>detalles de producto</h1>
@stop

@section('content')

{{-- {{dd($producto)}} --}}
<div class="card">
  <div class="card-header">
      {{-- Agregar --}}
  </div>
  <div class="card-body">
      <table class="table table-striped">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th colspan="2"></th> 
              </tr>
              
          </thead>
          <tbody>
      
               
                  {{-- {{dd($producto);}} --}}
                  <tr>
                      <td>{{$producto->id}}</td>
                      <td>{{$producto->name}}</td>
                      <td>{{$producto->description}}</td>

                      {{-- <td><img src="{{$producto->image_path}}" alt="" srcset=""></td> --}}
              
                  </tr>
                
             
          </tbody>
      </table>
  </div>
  <a href="{{route('pedidos.index')}}">Volver atras</a>
</div>
@stop

