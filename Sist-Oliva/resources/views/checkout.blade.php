@extends('layouts.app')

@section('content')
    {{-- @success --}}
    {{-- {{$estado;}}  --}}
    {{-- @if (session()->has('success_msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success_msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif --}}
    @if ($estado == null)
        {{ $estado = 'pendiente-pago' }};
    @endif
    <div class="card">
        <div class="card-body">
            <br>
            <br>


            <div class="container">
                <h5>Tu estado de pedido es el siguiente : {{ $estado }}</h3>
                    <div class="row">

                        @switch($estado)
                            @case('pendiente-pago')
                                {{-- {{dd($estado)}} --}}
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5>Datos del negocio</h5>
                                            {{-- cada vez que se refresca envia el correo| --}}
                                            {{-- <a class="btn btn-success" href="{{ route('pago') }}">Pagar</a> --}}

                                            <p>Se ha enviado los datos para realizar el pago a tu correo electronico</p>
                                            <form action="{{ route('comprobantes.store') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-group">
                                                    <b><label>Subir comprobante</label></b>
                                                    <br>
                                                    <p>No te olvides de subir tu comprobante para reflejar tu pago en el sistema
                                                    </p>

                                                    <input type="file" class="form-control-file" name="comprobante"
                                                        accept="image/*">
                                                </div>

                                                <input type="hidden" name="estado" value="{{ $estado }}" id="">
                                                <input type="hidden" name="id" value="{{ $id }}" id="">

                                                <button type="submit" class="btn btn-primary">Enviar comprobante</button>
                                            </form>

                                        </div>
                                    </div>

                                </div>
                            @break

                            @case('confirmado-pago')
                                {{-- {{dd($estado)}} --}}
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5>Datos de entrega</h5>

                                            <form action="{{ route('entrega.store') }}" method="POST">
                                                @csrf
                                                {{-- <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" name="local"
                                                    id="miCheckbox" checked>
                                                <label class="form-check-label" >Retiro en local</label>
                                            </div> --}}
                                                <div id="div1">
                                                    <div class="form-group">
                                                        <label>Dirección del lugar de entrega</label>
                                                        <input type="text" class="form-control" name="direccion">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Telefono de contacto</label>
                                                        <input type="text" class="form-control" name="telefono">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nombre de la persona que recibe</label>
                                                        <input type="text" class="form-control" name="nombre">
                                                    </div>


                                                    <div class="form-group">
                                                        <label>Nota</label>
                                                        <textarea class="form-control" aria-label="With textarea" name="nota"></textarea>
                                                    </div>

                                                </div>

                                                <input type="hidden" name="estado" value="{{ $estado }}" id="">
                                                <input type="hidden" name="id" value="{{ $id }}" id="">


                                                <button type="submit" class="btn btn-primary">Finalizar pedido</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>


                                {{-- <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Datos de facturacion</h5>

                                        <form>
                                            <div class="form-group">
                                                <label>Nombre y Apellido</label>
                                                <input type="email" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Numero de documento</label>
                                                <input type="email" class="form-control">
                                            </div>
                                            <small>Costo de producto $$$</small>
                                            <br>
                                            <small>Costo de envio $$$</small>
                                            <br>
                                            <br>
                                            <small>Costo total $$$</< /small>

                                                <br>
                                                <br>
                                                <button type="submit" class="btn btn-primary">Enviar datos para
                                                    facturacion</button>
                                        </form>

                                    </div>
                                </div>
                            </div> --}}
                            @break

                            @default
                                {{-- {{ dd($estado) }} --}}
                        @endswitch








                    </div>
            </div>

            <br>
            <br>
            {{-- cuando se active este boton se debe de actualizar los campos del "pre-predido" --}}
            {{-- <a href="#" class="btn btn-success">Realizar pedido</a> --}}


            <a href="{{ route('shop') }} " class="btn btn-danger">Cancelar</a>

        </div>

    </div>

    <script>
        // Obtén una referencia al checkbox
        const checkbox = document.getElementById('miCheckbox');
        const div = document.getElementById('div1');

        // Agrega un evento de escucha al checkbox
        checkbox.addEventListener('click', function() {
            // Verifica si el checkbox está marcado
            if (checkbox.checked) {
                div.style.display = "none"
            } else {
                div.style.display = "block"
            }
        });
    </script>
    <script src="/js/app.js"></script>
@endsection
