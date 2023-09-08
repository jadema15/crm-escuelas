@extends('layouts.navbar') 
@section('content')

<div class="container">
    <div style="margin:2em">
        <h3>Editar Escuela</h3>
    </div>
    <div class="card" style="pading:2em">
    <div class="card-body">
    <form action="{{ route('escuelas.update', $escuela->id) }}" class="form-group" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

            <div class="row">
                <div class="col">
                    @php($logo='sinlogo.jpg')

                    @if(!empty($escuela->logotipo))
                        @php($logo=$escuela->logotipo)
                    @endif                       
                   
                    <div style="width: 200px">
                        <img src="{{ asset('store/logos/' . $logo) }}" class="card-img-top" alt="{{ $escuela->nombre }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-6">
                    <label for="exampleInputPassword1" class="form-label titulo-campos">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $escuela->nombre }}">
                    </div>
                </div>
                <div class="col">     
                    <div class="mb-6">
                    <label for="exampleInputEmail1" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="direccion" aria-describedby="emailHelp" name="direccion" value="{{ $escuela->direccion }}">        
                    </div>
                </div>    
            </div>

            <div class="row">
                <div class="col">
                    <div class="mb-6">
                        <label for="exampleInputPassword1" class="form-label">Logotipo</label>
                        <input class="form-control" type="file" id="logotipo" name="logotipo" accept="image/jpeg, image/png">
                    </div>
                </div>
                <div class="col">     
                    <div class="mb-6">
                    <label for="exampleInputEmail1" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="correo" aria-describedby="emailHelp" name="correo" value="{{ $escuela->correo }}">       
                    </div>
                </div>    
            </div>

            <div class="row">
                <div class="col">
                    <div class="mb-6">
                        <label for="exampleInputPassword1" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $escuela->telefono }}">
                    </div>
                </div>
                <div class="col">    
                <div class="mb-6">
                        <label for="exampleInputPassword1" class="form-label">Página Web</label>
                        <input type="text" class="form-control" id="pagina_web" name="pagina_web" value="{{ $escuela->pagina_web }}">
                    </div>   
                </div>
            </div>      

            <div class="row" style="margin-top: 2em">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                        <button type="submit" class="btn btn-warning" >Regresar</button>
                    </div>         
            </div>
        </form>
    </div>
       
    </div>
  
</div>
@endsection