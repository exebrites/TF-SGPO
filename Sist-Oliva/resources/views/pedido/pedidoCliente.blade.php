@extends('layouts.app')

@section('content')
<br>
<br>
<div class="card">
    <div class="card-body">

        <h1>Tus pedidos y su estado</h1>
        {{-- {{dd($pedidos)}} --}}
        {{-- Hola {{$pedidos[0]->clientes->name}} --}}
        Hola Exe, estos son los pedidos que tenes con sus estados
        <ul>
            @foreach ($pedidos as $item)
            <li><a href="{{route('checkout.show',$item->id)}}">Nro de pedido: {{$item->id}} </a></li>
            @endforeach
          
        </ul>

    </div>
</div>

@endsection

