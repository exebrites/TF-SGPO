@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Editar pedido</h1>
@stop

@section('content')
    <div class="card">
        {{-- {{ dd($pedido) }} --}}
        <div class="card-body">
            <form action="{{ route('pedidos.update', $pedido->id) }}" method="post">
                @csrf
                @method('PUT')
                <div  class="form-group">
                    <label>Nro de pedido</label>
                    <input type="text" class="form-control" aria-describedby="textHelp" name=""
                        value="{{ $pedido->id }}">
                </div>

                <div class="form-group">
                    <label>Estado</label>
                    <br>
                    <select id="myCombo">
                        <option value="option1">Pendiente de pago</option>
                        <option value="option2">Pago confirmado</option>
                        <option value="option3">Proceso</option>
                        <option value="option4">Diseño</option>

                        <option value="option5">Terminado</option>
                        <option value="option6">Entregado</option>
                        <option value="option7">En espera</option>



                    </select>
                </div>


                <div class="form-group">
                    <label>Diseño</label>
                    <br>
                    <select id="myCombo">
                        <option value="option1">Si</option>
                        <option value="option1">NO</option>


                    </select>
                </div>


                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>

            <a class="btn btn-danger" href="http://">Cancelar</a>
        </div>
    </div>
@stop
