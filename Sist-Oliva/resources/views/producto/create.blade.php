@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Crear producto</h1>
@stop

@section('content')
   {{--<div class="card">
    <div class="card-body">
         parametro enctype --}}
        {{-- {!! Form::open(['route'=>'productos.store']) !!} 
        {!! Form::open(['route'=>'productos.store','enctype'=>'multipart/form-data']) !!} 
            <div class="form-group">
                {!! Form::label('name','Nombre') !!}
                {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'ingrese el nombre del producto']) !!}

                {!! Form::label('price','Precio') !!}
                {!! Form::text('price',null,['class'=>'form-control','placeholder'=>'ingrese el precio del producto']) !!}

                {!! Form::label('description','Descripcion') !!}
                {!! Form::text('description',null,['class'=>'form-control','placeholder'=>'ingrese la descripcion del producto']) !!}

                input file
                <input type="file" name="file" id="" accept="image/*">

                {!! Form::label('file','Seleccionar imagen') !!}
                <br>
                {!! Form::file('file',null,['class'=>'form-control','placeholder'=>'ingrese la imagen del producto','accept'=>'image/*']) !!}
               

            </div>
            {!! Form::submit('Agregar producto',['class'=>'btn btn-success'])  !!}

           <a class="btn btn-danger" href="{{route('productos.index')}}">Cancelar</a>
            {!! Form::close() !!}


    </div>
   </div> --}}
{{-- Implementacion con blade --}}
{{-- 
1-que modifique
2-traer los datos --}}
   <div class="card">
    <div class="card-body">
        <form action="{{route('productos.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label>Nombre</label>
              <input type="text" class="form-control" name="name">
            </div>

            <div class="form-group">
              <label>Precio</label>
              <input type="text" class="form-control" name="price">
            </div>

            
            <div class="form-group">
                <label >Descripcion</label>
                <input type="text" class="form-control" name="description">
              </div>
          

        
            <div class="form-group">
              <label >Seleccionar imagen</label>
              <input type="file" class="form-control-file" name="file" accept="image/*">
            </div>
         

          <button  type="submit" class="btn btn-primary">Submit</button>
         
        </form>
        <a href="{{route('productos.index')}}" class="btn btn-danger">Cancelar</a>
      </div>
      
   </div>
@stop