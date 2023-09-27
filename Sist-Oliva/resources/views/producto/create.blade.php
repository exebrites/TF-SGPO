@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Crear producto</h1>
@stop

@section('content')
   <div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'productos.store']) !!}
            <div class="form-group">
                {!! Form::label('name','Nombre') !!}
                {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'ingrese el nombre del producto']) !!}

                {!! Form::label('price','Precio') !!}
                {!! Form::text('price',null,['class'=>'form-control','placeholder'=>'ingrese el precio del producto']) !!}

                {!! Form::label('description','Descripcion') !!}
                {!! Form::text('description',null,['class'=>'form-control','placeholder'=>'ingrese la descripcion del producto']) !!}

            </div>
            {!! Form::submit('Agregar producto',['class'=>'btn btn-success'])  !!}
        {!! Form::close() !!}

    </div>
   </div>
@stop