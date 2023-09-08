@extends('layouts.navbar') 
@section('content')
<script src="{{ asset('js/escuela_validacion.js') }}"></script>
<div class="container">
    <div style="margin:2em">
        <h3>Registrar Escuela</h3>
    </div>
    <div class="card" style="pading:2em">
    <div class="card-body">
    @include('escuela.errors') 
    <div id="msgImagen"></div>
        <form action="{{ route('escuelas.store') }}" class="form-group" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-6">
                    <label for="nombre" class="form-label titulo">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
                    </div>
                </div>
                <div class="col">     
                    <div class="mb-6">
                    <label for="direccion" class="form-label titulo">Dirección</label>
                    <input type="text" class="form-control" id="direccion" aria-describedby="emailHelp" name="direccion" value="{{ old('direccion') }}">        
                    </div>
                </div>    
            </div>

            <div class="row">
                <div class="col">
                    <div class="mb-6">
                    <label for="logotipo" class="form-label titulo">Logotipo</label>
                        <input class="form-control" type="file" id="logotipo" name="logotipo" >
                    </div>
                </div>
                <div class="col">     
                    <div class="mb-6">
                    <label for="correo" class="form-label titulo">Correo</label>
                    <input type="email" class="form-control" id="correo" aria-describedby="emailHelp" name="correo"  value="{{ old('correo') }}" >        
                    </div>
                </div>    
            </div>

            <div class="row">
                <div class="col">
                    <div class="mb-6">
                        <label for="telefono" class="form-label titulo">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono"  value="{{ old('telefono') }}">
                    </div>
                </div>
                <div class="col">    
                <div class="mb-6">
                        <label for="pagina_web" class="form-label titulo">Página Web</label>
                        <input type="text" class="form-control" id="pagina_web" name="pagina_web"  value="{{ old('pagina_web') }}" >
                    </div>   
                </div>
            </div>      

            <div class="row" style="margin-top: 2em">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                        <a href="{{ route('escuelas.index') }}" class="btn btn-warning">Regresar<a>
                    </div>         
            </div>
        </form>       

    </div>       
    </div>  
</div>
@endsection

