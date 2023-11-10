@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Crear producto</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data">
                @csrf


                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    @error('name')
                        <br>
                        <small style="color:red">{{ $message }}</small>
                    @enderror
                </div>
                {{-- !! Agregar un alias o nomenclaruta !! --}}
                <div class="form-group">
                    <label>Alias</label>
                    <input type="text" class="form-control" name="alias" value="{{ old('') }}">
                    {{-- @error('name')
              <br>
              <small style="color:red">{{$message}}</small>
                 @enderror --}}
                </div>

                <div class="form-group">
                    <label>Precio</label>
                    <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                    @error('price')
                        <br>
                        <small style="color:red">{{ $message }}</small>
                    @enderror
                </div>


                <div class="form-group">
                    <label>Descripcion</label>
                    <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                    @error('description')
                        <br>
                        <small style="color:red">{{ $message }}</small>
                    @enderror
                </div>



                <div class="form-group">
                    <label>Seleccionar imagen</label>
                    <input type="file" class="form-control-file" name="file" accept="image/*">
                    @error('file')
                        <br>
                        <small style="color:red">{{ $message }}</small>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">Crear nuevo producto</button>

            </form>
            <a href="{{ route('productos.index') }}" class="btn btn-danger">Cancelar</a>
        </div>

    </div>
@stop
