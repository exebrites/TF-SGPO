@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Editar pedido</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form>
            <div class="form-group">
              <label>--</label>
              <input type="text" class="form-control" aria-describedby="textHelp" name="">
            </div>

            <div class="form-group">
              <label >--</label>
              <input type="text" class="form-control" name="">
            </div>

            
            <div class="form-group">
                <label>--</label>
                <input type="text" class="form-control" name="">
              </div>
         

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      
      <a class="btn btn-danger" href="http://">Cancelar</a>
    </div>
   </div>
@stop

