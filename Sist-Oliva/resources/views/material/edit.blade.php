@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Pagina de actualizar material</h1>
@stop

@section('content')
    {{-- {{ dd($material) }} --}}
    <div class="card">
        <div class="card-body">
            <form action="{{ route('materiales.update', $material) }}" method="post">
                @csrf
                @method('PUT')
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


                {{-- // id integer pk
            // nombre string
            // descripcion string
            // cod_interno string
            // stock string
            // unidad_medida string
            // fecha_adquisicion date
            // fecha_vencimiento date
            // notas string --}}
                <input type="text" class="form-control" name="id" value="{{ $material->id }}" readonly>


                <div class="form-group">
                    <label>*Nombre</label>
                    {{-- value="{{ old('') }}" --}}
                    <input type="text" class="form-control" name="nombre" value="{{ $material->nombre }}">
                    {{-- @error('name')
                    <br>
                    <small style="color:red">{{ $message }}</small>
                @enderror --}}
                </div>
                {{-- !! Agregar un alias o nomenclaruta !! --}}
                <div class="form-group">
                    <label>*descripcion</label>
                    <input type="text" class="form-control" name="descripcion" value="{{ $material->descripcion }}">
                    {{-- @error('name')
          <br>
          <small style="color:red">{{$message}}</small>
             @enderror --}}
                </div>

                <div class="form-group">
                    <label>*codigo interno</label>
                    <input type="text" class="form-control" name="cod" value="{{ $material->cod_interno }}">
                    {{-- @error('price')
                    <br>
                    <small style="color:red">{{ $message }}</small>
                @enderror --}}
                </div>


                <div class="form-group">
                    <label>*cantidad en stock</label>
                    <input type="text" class="form-control" name="stock" value="{{ $material->stock }}">
                    {{-- @error('description')
                    <br>
                    <small style="color:red">{{ $message }}</small>
                @enderror --}}
                </div>



                <div class="form-group">
                    <label>unidad de medida</label>
                    <input type="text" class="form-control" name="medida" value="{{ $material->unidad_medida }}">
                    {{-- @error('file')
                    <br>
                    <small style="color:red">{{ $message }}</small>
                @enderror --}}
                </div>




                <div class="form-group">
                    <label>*fecha de adquisicion</label>
                    <input type="text" class="form-control" name="f_adquisicion"
                        value="{{ $material->fecha_adquisicion }}">
                    {{-- @error('file')
                    <br>
                    <small style="color:red">{{ $message }}</small>
                @enderror --}}
                </div>

                <div class="form-group">
                    <label>fecha de vencimiento</label>
                    <input type="text" class="form-control" name="f_vencimiento"
                        value="{{ $material->fecha_vencimiento }}">
                    {{-- @error('file')
                    <br>
                    <small style="color:red">{{ $message }}</small>
                @enderror --}}
                </div>
                <div class="form-group">
                    <label>notas</label>
                    <textarea class="form-control" name="notas" rows="5" value="{{ $material->notas }}"></textarea>
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
