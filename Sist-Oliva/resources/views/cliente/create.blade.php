@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Crear un nuevo cliente</h1>
@stop

@section('content')
     {{-- <div class="card">
    <div class="card-body">
      parametro enctype --}}
        {{-- {!! Form::open(['route'=>'productos.store']) !!}  --}}

        {{-- enlazar a clientes.store: 'route'=>'productos.store' 
        {!! Form::open(['route'=>'clientes.store']) !!} 
            <div class="form-group">
                {!! Form::label('DNI','DNI') !!}
                {!! Form::text('DNI',null,['class'=>'form-control','placeholder'=>'ingrese el DNI del cliente']) !!} 
                
                {!! Form::label('nombre','Nombre') !!}
                {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'ingrese el nombre del cliente']) !!}

             

               

                {{-- input file --}}
                {{-- <input type="file" name="file" id="" accept="image/*"> --}}

                {{-- {!! Form::label('file','Seleccionar imagen') !!}
                <br>
                {!! Form::file('file',null,['class'=>'form-control','placeholder'=>'ingrese la imagen del producto','accept'=>'image/*']) !!}
               

            </div>
            {!! Form::submit('Agregar cliente',['class'=>'btn btn-success'])  !!}

            {{-- enlazar a index de cliente: href="{{route('productos.index')}}" 
           <a class="btn btn-danger" >Cancelar</a>
            {!! Form::close() !!}


    </div>
   </div>--}}

{{-- IMPLEMENTAR --}}
   <div class="card">
    <div class="card-body">
        <form action="{{route('clientes.store')}}" method="post">
          @csrf
           <div class="form-group">
              <label >DNI</label>
              <input type="text" class="form-control" name="DNI">
            </div>
            <div class="form-group">
              <label >Nombre</label>
              <input type="text" class="form-control" name="nombre">
            </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>      
    </div>
   </div>
@stop