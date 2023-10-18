@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">


            <div class="card" >
                <div class="card-body">
                    <h1>Realizar un boceto</h1>
                    <form>
                        <div class="form-group">
                          <label>Nombre del negocio</label>
                          <input type="" class="form-control"  aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label>Para que quiere el diseño?</label>
                            <input type="" class="form-control"  aria-describedby="emailHelp">
                          </div>
                        
                          <div class="form-group">
                            <label>A quien va dirigido el diseño</label>
                            <input type="" class="form-control"  aria-describedby="emailHelp">
                          </div>
                          <div class="form-group">
                              <label>Agregar contenido y texto</label>
                              <textarea class="form-control" aria-label="With textarea"></textarea>                            </div>
                            
                        <div class="form-group">
                            <label>Agregar logotipo y elementos de la marca</label>
                            <input type="file" class="form-control"  aria-describedby="emailHelp">
                         
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">No tengo logotipo ni elementos de marca</label>
                              </div>
                        </div>
                         
                          <div class="form-group">
                              <label>Agregar imagenes y recursos visuales</label>
                              <input type="file" class="form-control"  aria-describedby="emailHelp">
                            </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                      </form>
                      <a href="/" class="btn btn-danger">Cancelar</a>
                </div>
            </div>
       
          
        
        </div>
        <div class="col-2"></div>

    </div>
   
  
@endsection