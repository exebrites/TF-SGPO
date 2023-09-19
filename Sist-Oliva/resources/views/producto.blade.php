@extends('layouts.app')
@section('content')
{{-- {{dd($productoducto)}} --}}
{{-- nombre
descripcion
precio
imagen --}}
<br>


<div class="card-body">
    {{-- acceder a los detalles del productoducto atraves del nombre --}}
    <img src="/images\{{ $producto->image_path }}" alt="" srcset="">
    <a href=""><h6 class="card-title">{{ $producto->name }}</h6></a>
    <p>${{ $producto->price }}</p>
    <form action="{{ route('cart.store') }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" value="{{ $producto->id }}" id="id" name="id">
        <input type="hidden" value="{{ $producto->name }}" id="name" name="name">
        <input type="hidden" value="{{ $producto->price }}" id="price" name="price">
        <input type="hidden" value="{{ $producto->image_path }}" id="img" name="img">
        <input type="hidden" value="{{ $producto->slug }}" id="slug" name="slug">
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
  
@endsection