@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Editar pedido</h1>
@stop
{{-- 
        ***PENDIENTES***    
    
        ### Que valor tiene pedido ?

        ###NO mandar "seleccionar" 
        
        --}}
@section('content')
    <div class="card">
        {{-- {{ dd($pedido->detallePedido[0]->disenio->disenio_estado) }} --}}
        <div class="card-body">
            <form action="{{ route('pedidos.update', $pedido->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group" style="">
                    <label>Nro de pedido</label>
                    <input type="text" class="form-control" aria-describedby="textHelp" name=""
                        value="{{ $pedido->id }}" readonly>
                </div>

                <div class="form-group">
                    <label>Estado : {{ $pedido->estado }}</label>
                    <br>
                    {{-- valores que toma estado: pediente-pago,confirmado-pago,inicio,disenio
                    //terminado,despachado,entregado espera --}}
                    <select class="custom-select" id="myCombo" name="estado">
                        {{-- <option selected>Seleccionar</option> --}}

                        <option value="pendiente-pago">Pendiente de pago</option>
                        <option value="confirmado-pago">Pago confirmado</option>
                        <option value="inicio">Inicio</option>
                        <option value="disenio">Diseño</option>

                        <option value="terminado">Terminado</option>
                        <option value="despachado">Despachado</option>

                        <option value="entregado">Entregado</option>
                        <option value="espera">En espera</option>



                    </select>
                </div>


                <div class="form-group">
                    <label>Diseño : {{ $pedido->disenio_estado }}</label>
                    <br>
                    {{-- valores que toma disenio_estado:TIENE, NO TIENE --}}



                    <select class="custom-select" id="myCombo" name="disenio">
                        {{-- <option selected>Seleccionar</option> --}}

                        <option value="1">TIENE</option>
                        <option value="0">NO TIENE</option>


                    </select>
                </div>


                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>

            <a class="btn btn-danger" href="{{ route('pedidos.index') }}">Cancelar</a>
        </div>
    </div>
@stop
