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
    <ul>
        @foreach ($disenios as $item)
            <br>
            <li>id del diseño:{{ $item->id }}</li>
            <li>imagen del diseño:<img src="{{ $item->url_imagen }}" alt=""></li><a
                href="{{ route('prueba.d', $item->id) }}">Descargar</a>
            <br>
        @endforeach
    </ul>


    <br>
</body>

</html>
