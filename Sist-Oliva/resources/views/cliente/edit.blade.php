@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Editar un cliente</h1>
@stop

@section('content')
{{-- {{dd($cliente)}} --}}
<div class="card">
    <div class="card-body">
        {{-- adaptarlo para clientes
          
            --}}

            {!! Form::model($cliente,['route'=>['clientes.update',$cliente],'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('id','Identificador') !!}
                {!! Form::text('id',null,['class'=>'form-control','readonly']) !!}

                {!! Form::label('nombre','Nombre') !!}
                {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'ingrese el nombre del cliente']) !!}
{{-- 
                {!! Form::label('price','Precio') !!}
                {!! Form::text('price',null,['class'=>'form-control','placeholder'=>'ingrese el precio del producto']) !!}

                {!! Form::label('description','Descripcion') !!}
                {!! Form::text('description',null,['class'=>'form-control','placeholder'=>'ingrese la descripcion del producto']) !!} --}}

            </div>
            {!! Form::submit('Actualizar cliente',['class'=>'btn btn-primary'])  !!}
            <a class="btn btn-danger" href="{{route('clientes.index')}}">Cancelar</a>

        {!! Form::close() !!}

    </div>
   </div>
@stop
