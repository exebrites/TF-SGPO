@extends('adminlte::page')
<link rel="stylesheet" href="/css/app.css">

<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

@section('title')

@section('content_header')
    <h1>Crear un nuevo diseño</h1>
@stop

@section('content')
{{-- {{dd($disenio)}} --}}

    <div class="card">
        {{-- <div class="card-body">
            <img src="{{$disenio->url}}" alt="Imagen de diseño" srcset="">
        </div>--}}
        <div class="card-body"> 
                  {{-- dropzone --}}

        {{-- default: name=file --}}
        <form action="{{ route('disenios.store') }}" method="post" class="dropzone" id="my-awesome-dropzone">

        </form>

        <a href="" data-dz-remove>Resubir diseño</a>
        <br>
        <button class="btn btn-success" type="submit" id="start-upload-button">Subir diseño</button>



        </div>
  

    </div>



    <a href="{{ route('disenios.index') }}" class="btn btn-danger">volver atras</a>





    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <script>
        // Note that the name "myDropzone" is the camelized
        // id of the form.
        Dropzone.options.myAwesomeDropzone = {
            // Configuration options go here
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            dictDefacultMessage: "Arrastre una imagen al recuadro para subirlo",
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
@stop
