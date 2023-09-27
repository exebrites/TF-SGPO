@extends('layouts.app')

@section('content')

<br>
<br>
<br>
<div class="row">
    {{-- {{dd($pro);}} --}}
        <div class="col-lg-3">
            <div class="card" style="margin-bottom: 20px; height: auto;">
                <img src="/images/{{ $pro->image_path }}"
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

</div>
@endsection