@extends('layouts.app')
<link rel="stylesheet" href="/css/app.css">

<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

{{-- ***IDEA***

#Valores por defecto
    - por defecto  el ciente no tiene diseño
    - cada vez que suba se cambia ese Estado
    - cuando pasa al boceto el estado de diseño es que no tiene 
    
    --}}

@section('content')
    <br>
    <br>
    <br>
    <div class="row">
        {{-- {{dd($pro);}} --}}
        <div class="col-4">
            <div class="card" style="margin-bottom: 20px; height: auto;">
                <img src="{{ $pro->image_path }}" class="card-img-top mx-auto"
                    style="height: 150px; width: 150px;display: block;" alt="{{ $pro->image_path }}">
                <div class="card-body">
                    {{-- acceder a los detalles del producto atraves del nombre --}}
                    <a href="{{ route('producto.detalle', ['id' => $pro->id]) }}">
                        <h6 class="card-title">{{ $pro->name }}</h6>
                    </a>
                    {{-- <a href="">{{ $pro->name }}</a> --}}
                    <p>${{ $pro->price }}</p>
                    <form action="{{ route('cart.store') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                        <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
                        <input type="hidden" value="{{ $pro->price }}" id="price" name="price">
                        <input type="hidden" value="{{ $pro->image_path }}" id="img" name="img">
                        <input type="hidden" value="{{ $pro->slug }}" id="slug" name="slug">
                        <input type="hidden" value="1" id="quantity" name="quantity">
                        <div class="card-footer" style="background-color: white;">
                            <div class="row">
                                <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                    <i class="fa fa-shopping-cart"></i> agregar al carrito
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-8">
            <div class="card" style="margin-bottom: 20px; height: auto;">
                <div class="card-body">
                    <h3>En caso de tener un diseño propio subirlo aqui</h3>
                    {{-- dropzone --}}

                    {{-- default: name=file --}}
                    <form action="{{ route('prueba') }}" method="post" class="dropzone" id="my-awesome-dropzone">

                    </form>

                    <a href="" data-dz-remove>Resubir imagen</a>
                    <br>
                    <button type="submit" id="start-upload-button">Enviar </button>
                    <br>
                    <input type="checkbox" name="miCheckbox" id="miCheckbox">No tengo diseño


                </div>
                <h3 id="h3" style="display: none">No tienes un diseño propio? Hace click aquí <a
                        href="{{ Route('boceto') }}" class="btn btn-primary">Hacer un Boceto</a></h3>
            </div>

        </div>

    </div>


    {{-- Archivos js  --}}
    <script>
        // Obtén una referencia al checkbox
        const checkbox = document.getElementById('miCheckbox');
        const h3 = document.getElementById('h3');


        // Agrega un evento de escucha al checkbox
        checkbox.addEventListener('click', function() {
            // Verifica si el checkbox está marcado
            if (checkbox.checked) {
                h3.style.display = "block"
                // Redirige a la página deseada
                // window.location.href =
                //     '/boceto'; // Reemplaza 'https://www.ejemplo.com' con la URL a la que deseas redirigir.
            } else {
                h3.style.display = "none"
            }
        });
    </script>

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
 
    <script>
        // Note that the name "myDropzone" is the camelized
        // id of the form.
        Dropzone.options.myAwesomeDropzone = {
            // Configuration options go here
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            dictDefacultMessage:"Arrastre una imagen al recuadro para subirlo" ,
            acceptedFiles: "image/*",
            maxFilesize: 4, //en MB's
            maxFiles: 1,
            autoProcessQueue: false,
            // paramName:'' //cambiar el name
        };
        var myDropzone = new Dropzone("#my-awesome-dropzone");

        // Maneja el evento de inicio de carga (puede estar vinculado a un botón)
        document.getElementById("start-upload-button").addEventListener("click", function() {
            myDropzone.processQueue(); // Inicia el proceso de carga cuando se hace clic en el botón
        });
    </script>
    <script src="/js/app.js"></script>
@endsection
