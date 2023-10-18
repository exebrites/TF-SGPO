@extends('layouts.app')

@section('content')
<div class="card">
   <div class="card-body">
    <br>
    <br>
  

<div class="container">

  <div class="row">
    <div class="col">
<div class="card">
  <div class="card-body">
    <h5>Datos del negocio</h5>
    {{-- cada vez que se refresca envia el correo| --}}
    <a class="btn btn-success" href="{{route('pago')}}">Pagar</a>

    <p>Se ha enviado los datos para realizar el pago a tu correo electronico</p>
    <form action="{{route('comprobante')}}" method="post" enctype="multipart/form-data">
      @csrf
    
      <div class="form-group">
        <b><label >Subir comprobante</label></b>
        <br>
        <p>No te olvides de subir tu comprobante para reflejar tu pago en el sistema</p>
        
        <input type="file" class="form-control-file" name="comprobante" accept="image/*" >
      </div>
      <button type="submit" class="btn btn-primary">Enviar comprobante</button>
    </form>

  </div>
</div>

    </div>
    <div class="col-4">
      <div class="card">
        <div class="card-body">
          <h5>Datos de entrega</h5>

      <form>
        <div class="form-group">
          <label for="exampleInputEmail1">Dirección del lugar de entrega</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Telefono de contacto</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nombre de la persona que recibe</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">Nota</label>
          <textarea class="form-control" aria-label="With textarea"></textarea>


        </div>


        
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Retiro en local</label>
        </div>
        <button type="submit" class="btn btn-primary">Enviar datos de entrega</button>
      </form>
      
  </div>
</div>
    </div>

    
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5>Datos de facturacion</h5>

      <form>
        <div class="form-group">
          <label for="exampleInputEmail1">Nombre y Apellido</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Numero de documento</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <small>Costo de producto        $$$</small>
        <br>
        <small>Costo de envio           $$$</small>
<br>
<br>
        <small>Costo total $$$</</small>

       <br>
       <br>
        <button type="submit" class="btn btn-primary">Enviar datos para facturacion</button>
      </form>
      
  </div>
</div>
    </div>
  </div>
</div>

<br>
<br>
<a  href="{{route('procesarPedido.procesar')}}"  class="btn btn-success">Realizar pedido</a>
<a href="http://" class="btn btn-danger">Cancelar</a>

</div>

</div>

@endsection