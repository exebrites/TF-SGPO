@extends('layouts.app')

@section('content')
<div class="card">
   <div class="card-body">
      <h1>Aqui se realiza todo el proceso para pagar el carrito</h1>
   <hr>
   <h1>Subir diseño</h1>
   <div class="input-group mb-3">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <label>Tiene un diseño propio para subir?</label>
          <br>
          <input type="checkbox" aria-label="Checkbox for following text input">
        </div>
      </div>
    </div>
   <hr>
   <h1>Datos para realizar la entrega</h1>
    <hr>
    <h1>Datos para realizar la facturacion</h1>
    <hr>
    <a href="{{route('procesarPedido.procesar')}}"  class="btn btn-success">Realizar pedido</a>

   </div>

</div>

@endsection