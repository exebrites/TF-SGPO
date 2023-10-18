@extends('layouts.app')
<link rel="stylesheet" href="/css/app.css">

<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />



@section('content')

<br>
<br>
<br>
<div class="row">
    {{-- {{dd($pro);}} --}}
        <div class="col-4">
            <div class="card" style="margin-bottom: 20px; height: auto;">
                <img src="{{ $pro->image_path }}"
                     class="card-img-top mx-auto"
                     style="height: 150px; width: 150px;display: block;"
                     alt="{{ $pro->image_path }}"
                >
                <div class="card-body">
                    {{-- acceder a los detalles del producto atraves del nombre --}}
                    <a href="{{route('producto.detalle',['id'=>$pro->id])}}"><h6 class="card-title">{{ $pro->name }}</h6></a>
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
                <form action="{{route('prueba')}}"
                    method="post"
                    class="dropzone"
                     id="my-awesome-dropzone">
                 </form>     
                 <a href="" data-dz-remove >Resubir imagen</a>



               {{-- <form action="" method="post">
                <label for="">Subir diseño</label>
                <br>
                <input type="file" name="" id="">
                <br>
                <input type="submit" class="btn btn-success" value="Enviar">
               </form> --}}
            </div>
               <h3>No tienes un diseño propio? Hace click aquí <a href="{{Route('boceto')}}" class="btn btn-primary">Hacer un diseño</a></h3>
            </div>
           
        </div>

</div>

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

<script>
  // Note that the name "myDropzone" is the camelized
  // id of the form.
  Dropzone.options.myAwesomeDropzone = {
    // Configuration options go here
    headers:{
       'X-CSRF-TOKEN':"{{csrf_token()}}"
    },
    dictDefacultMessage:"Arrastre una imagen al recuadro para subirlo" ,
    acceptedFiles: "image/*",
    maxFilesize: 4, //en MB's
    maxFiles:1,
// paramName:'' //cambiar el name
  };
</script>
 <script src="/js/app.js"></script>
 
@endsection
