@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Editar producto</h1>
@stop

@section('content')
{{-- {{dd($producto);}} --}}
<div class="card">
    <div class="card-body">
        {!! Form::model($producto,['route'=>['productos.update',$producto],'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('id','Identificador') !!}
                {!! Form::text('id',null,['class'=>'form-control','readonly']) !!}

                {!! Form::label('name','Nombre') !!}
                {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'ingrese el nombre del producto']) !!}

                {!! Form::label('price','Precio') !!}
                {!! Form::text('price',null,['class'=>'form-control','placeholder'=>'ingrese el precio del producto']) !!}

                {!! Form::label('description','Descripcion') !!}
                {!! Form::text('description',null,['class'=>'form-control','placeholder'=>'ingrese la descripcion del producto']) !!}

            </div>
            {!! Form::submit('Actualizar producto',['class'=>'btn btn-primary'])  !!}
            <a class="btn btn-danger" href="{{route('productos.index')}}">Cancelar</a>

        {!! Form::close() !!}

    </div>
   </div>
@stop