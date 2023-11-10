@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Pagina de agregar nuevo proveedor</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('proveedores.store') }}" method="post">
                @csrf


                <div class="form-group">
                    <label>Nombre empresa</label>
                    {{-- value="{{ old('') }}" --}}
                    <input type="text" class="form-control" name="empresa">
                    {{-- @error('name')
                        <br>
                        <small style="color:red">{{ $message }}</small>
                    @enderror --}}
                </div>
                {{-- !! Agregar un alias o nomenclaruta !! --}}
                <div class="form-group">
                    <label>Nombre contacto</label>
                    <input type="text" class="form-control" name="contacto">
                    {{-- @error('name')
              <br>
              <small style="color:red">{{$message}}</small>
                 @enderror --}}
                </div>

                <div class="form-group">
                  <label>CUIT</label>
                  <input type="text" class="form-control" name="cuit" >
                    {{-- @error('price')
                        <br>
                        <small style="color:red">{{ $message }}</small>
                    @enderror --}}
                </div>


                <div class="form-group">
                    <label>telefono</label>
                    <input type="text" class="form-control" name="telefono" >
                    {{-- @error('description')
                        <br>
                        <small style="color:red">{{ $message }}</small>
                    @enderror --}}
                </div>



                <div class="form-group">
                    <label>correo electronico</label>
                    <input type="text" class="form-control" name="correo" >
                    {{-- @error('file')
                        <br>
                        <small style="color:red">{{ $message }}</small>
                    @enderror --}}
                </div>


                <button type="submit" class="btn btn-primary">Agregar nuevo proveedor</button>

            </form>
            <a href="{{ route('proveedores.index') }}" class="btn btn-danger">Cancelar</a>
        </div>

    </div>
@stop
