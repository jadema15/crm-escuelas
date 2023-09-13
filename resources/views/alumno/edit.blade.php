@extends('layouts.navbar') 
@section('content')
<script src="{{asset('js/escuela.js')}}"></script>
<div class="container">
    <div style="margin:2em">
        <h3>Editar Alumno</h3>
    </div>
    <div class="card" style="pading:2em">
    <div class="card-body">
    <form action="{{ route('alumnos.update', $alumno->id) }}" class="form-group" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
            
            <div class="row">
                <div class="col">
                    <div class="mb-6">
                    <label for="exampleInputPassword1" class="form-label titulo-campos">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $alumno->nombre }}">
                    </div>
                </div>
                <div class="col">     
                    <div class="mb-6">
                    <label for="exampleInputEmail1" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido" aria-describedby="emailHelp" name="apellido" value="{{ $alumno->apellido }}">        
                    </div>
                </div>    
            </div>

            <div class="row">
                <div class="col">
                    <div class="mb-6">
                        <label for="exampleInputPassword1" class="form-label">Escuela</label>
                        <input type="hidden" value="{{$alumno->escuela_id}}" id="escuela_id_consulta">
                        <select id="escuela_id" class="form-control" name="escuela_id">
                        </select>                           
                    </div>
                </div>
                <div class="col">     
                    <div class="mb-6">
                    <label for="exampleInputEmail1" class="form-label">Fecha Nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" aria-describedby="emailHelp" name="fecha_nacimiento" value="{{ $alumno->fecha_nacimiento }}">       
                    </div>
                </div>    
            </div>

            <div class="row">
                <div class="col">
                    <div class="mb-6">
                        <label for="exampleInputPassword1" class="form-label">Ciudad Natal</label>
                        <input type="text" class="form-control" id="ciudad_natal" name="ciudad_natal" value="{{ $alumno->ciudad_natal }}">
                    </div>
                </div>
                <div class="col">    
                <div class="mb-6">
                        <label for="exampleInputPassword1" class="form-label">Edad</label>
                        <input type="text" class="form-control" value="{{ $edad }}">
                    </div>
                </div>
            </div>      

            <div class="row" style="margin-top: 2em">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <button type="submit" class="btn btn-warning" >Regresar</button>
                    </div>         
            </div>
        </form>
    </div>
       
    </div>
  
</div>
@endsection