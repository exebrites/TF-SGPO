@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Pagina de prueba</h1>
@stop

@section('content')
   <div class="card">
    <div class="card-body">
        <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Nombre</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Precio</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div>

            
            <div class="form-group">
                <label for="exampleInputPassword1">Descripcion</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
              </div>
          

          <form>
            <div class="form-group">
              <label for="exampleFormControlFile1">Seleccionar imagen</label>
              <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
          </form>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      
      <a class="btn btn-danger" href="http://">Cancelar</a>
    </div>
   </div>
@stop

