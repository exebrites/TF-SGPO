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
  hola
{{-- default: name=file --}}
  <form action="{{route('prueba')}}"
    method="post"
      class="dropzone"
      id="my-awesome-dropzone">
      </form>
      <a href="" data-dz-remove >borrar</a>


  
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
      maxFilesize: 1, //en MB's
      maxFiles:1,
// paramName:'' //cambiar el name
    };
  </script>
   <script src="/js/app.js"></script>
</body>
</html>

