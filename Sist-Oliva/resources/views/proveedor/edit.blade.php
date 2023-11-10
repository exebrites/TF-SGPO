@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Pagina de actualizar proveedor</h1>
@stop

@section('content')
{{-- {{dd($proveedor)}} --}}
    <div class="card">
        <div class="card-body">
            <form action="{{ route('proveedores.update',$proveedor) }}" method="post">
                @csrf
                @method('put')
                <input type="text" class="form-control" name="id" value="{{ $proveedor->id }}" readonly >

                <div class="form-group">
                    <label>Nombre empresa</label>
                    {{-- value="{{ old('') }}" --}}
                    <input type="text" class="form-control" name="empresa" value="{{ $proveedor->nombre_empresa }}">
                    {{-- @error('name')
                    <br>
                    <small style="color:red">{{ $message }}</small>
                @enderror --}}
                </div>
                {{-- !! Agregar un alias o nomenclaruta !! --}}
                <div class="form-group">
                    <label>Nombre contacto</label>
                    <input type="text" class="form-control" name="contacto" value="{{ $proveedor->nombre_contacto }}">
                    {{-- @error('name')
          <br>
          <small style="color:red">{{$message}}</small>
             @enderror --}}
                </div>

                <div class="form-group">
                    <label>CUIT</label>
                    <input type="text" class="form-control" name="cuit" value="{{ $proveedor->cuit }}">
                    {{-- @error('price')
                    <br>
                    <small style="color:red">{{ $message }}</small>
                @enderror --}}
                </div>


                <div class="form-group">
                    <label>telefono</label>
                    <input type="text" class="form-control" name="telefono" value="{{ $proveedor->telefono }}">
                    {{-- @error('description')
                    <br>
                    <small style="color:red">{{ $message }}</small>
                @enderror --}}
                </div>



                <div class="form-group">
                    <label>correo electronico</label>
                    <input type="text" class="form-control" name="correo" value="{{ $proveedor->correo }}">
                    {{-- @error('file')
                    <br>
                    <small style="color:red">{{ $message }}</small>
                @enderror --}}
                </div>


                <button type="submit" class="btn btn-primary">Actualizar proveedor</button>

            </form>
            <a href="{{ route('proveedores.index') }}" class="btn btn-danger">Cancelar</a>
        </div>

    </div>
@stop
