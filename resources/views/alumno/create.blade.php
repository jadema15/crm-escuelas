@extends('layouts.navbar') 
@section('content')
<script src="{{asset('js/escuela.js')}}"></script>
<div class="container">
    <div style="margin:2em">
        <h3>Registrar Alumno</h3>
    </div>
    <div class="card" style="pading:2em">
        <div class="card-body">
            @include('escuela.errors') 
            <form action="{{ route('alumnos.store') }}" class="form-group" method="POST" enctype="multipart/form-data">
            @csrf           
                <div class="row">
                    <div class="col">
                        <div class="mb-6">
                        <label for="exampleInputPassword1" class="form-label titulo-campos">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
                        </div>
                    </div>
                    <div class="col">     
                        <div class="mb-6">
                        <label for="exampleInputEmail1" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" aria-describedby="emailHelp" name="apellido" value="{{ old('apellido') }}">        
                        </div>
                    </div>    
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-6">
                            <label for="exampleInputPassword1" class="form-label">Escuela</label>                        
                            <select id="escuela_id" class="form-control" name="escuela_id">
                            </select>                           
                        </div>
                    </div>
                    <div class="col">     
                        <div class="mb-6">
                        <label for="exampleInputEmail1" class="form-label">Fecha Nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" aria-describedby="emailHelp" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">       
                        </div>
                    </div>    
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-6">
                            <label for="exampleInputPassword1" class="form-label">Ciudad Natal</label>
                            <input type="text" class="form-control" id="ciudad_natal" name="ciudad_natal" value="{{ old('ciudad_natal') }}">
                        </div>
                    </div>
                    <div class="col">    
                    
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