@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Crear pedidos</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('pedidos.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label>--</label>
              <input type="text" class="form-control" name="">
            </div>

            <div class="form-group">
              <label>--</label>
              <input type="text" class="form-control" name="">
            </div>

            
            <div class="form-group">
                <label >--</label>
                <input type="text" class="form-control" name="">
              </div>
          

        
            
         

          <button  type="submit" class="btn btn-primary">Submit</button>
         
        </form>
      </div>
   </div>
   
@stop

