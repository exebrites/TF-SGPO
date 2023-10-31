<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">

    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <title>Document</title>
</head>

<body>
    {{dd($c)}}
    Trabajando con un producto <br>

    @foreach ($c as $item)
    <br>
    Nombre del producto: {{ $item->name }} <br>
    Cantidad: {{ $item->quantity }}<br>
    Precio unitario:{{ $item->price }} <br>
    Subtotal: {{ \Cart::get($item->id)->getPriceSum() }}<br>
    Total: {{ \Cart::getTotal() }} <br>
    @endforeach
    <br>
 
</body>

</html>
