@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Pagina de agregar nuevo material</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('materiales.store') }}" method="post">
                @csrf
{{-- 
                <th>ID</th>
                <th>Nombre</th>
                <th>descripcion</th>
                <th>codigo interno</th>
                <th>cantidad en stock</th>
                <th>unidad de medida</th>
                <th>fecha de adquisicion</th>

                <th>fecha de vencimiento</th>
                <th>notas</th> --}}

                <div class="form-group">
                    <label>*Nombre</label>
                    {{-- value="{{ old('') }}" --}}
                    <input type="text" class="form-control" name="nombre">
                    {{-- @error('name')
                        <br>
                        <small style="color:red">{{ $message }}</small>
                    @enderror --}}
                </div>
                {{-- !! Agregar un alias o nomenclaruta !! --}}
                <div class="form-group">
                    <label>*descripcion</label>
                    <input type="text" class="form-control" name="descripcion">
                    {{-- @error('name')
              <br>
              <small style="color:red">{{$message}}</small>
                 @enderror --}}
                </div>

                <div class="form-group">
                  <label>*codigo interno</label>
                  <input type="text" class="form-control" name="cod" >
                    {{-- @error('price')
                        <br>
                        <small style="color:red">{{ $message }}</small>
                    @enderror --}}
                </div>


                <div class="form-group">
                    <label>*cantidad en stock</label>
                    <input type="text" class="form-control" name="stock" >
                    {{-- @error('description')
                        <br>
                        <small style="color:red">{{ $message }}</small>
                    @enderror --}}
                </div>



                <div class="form-group">
                    <label>unidad de medida</label>
                    <input type="text" class="form-control" name="medida" >
                    {{-- @error('file')
                        <br>
                        <small style="color:red">{{ $message }}</small>
                    @enderror --}}
                </div>

                
             
                
                <div class="form-group">
                    <label>*fecha de adquisicion</label>
                    <input type="text" class="form-control" name="f_adquisicion" >
                    {{-- @error('file')
                        <br>
                        <small style="color:red">{{ $message }}</small>
                    @enderror --}}
                </div>
                
                <div class="form-group">
                    <label>fecha de vencimiento</label>
                    <input type="text" class="form-control" name="f_vencimiento" >
                    {{-- @error('file')
                        <br>
                        <small style="color:red">{{ $message }}</small>
                    @enderror --}}
                </div>
                <div class="form-group">
                    <label>notas</label>
                    <textarea class="form-control" name="notas" rows="5"></textarea>
                    {{-- @error('file')
                        <br>
                        <small style="color:red">{{ $message }}</small>
                    @enderror --}}
                </div>

                <button type="submit" class="btn btn-primary">Agregar nuevo material</button>

            </form>
            <a href="{{ route('proveedores.index') }}" class="btn btn-danger">Cancelar</a>
        </div>

    </div>
@stop
