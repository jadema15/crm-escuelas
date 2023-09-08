<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}"></script>
@extends('../layouts.navbar') 
@section('content')


<div class="container">
    <div style="margin:2em">
        <h3>Escuelas</h3>
    </div>
    <div style="text-aling:center">
        <a href="{{ Route('escuelas.create') }}" class="btn btn-success" style="margin:0.5em">
             <i class="fas fa-trash"></i> Agregar
        </a>      
    </div>

        @if(session('error'))
        <div class="alert alert-danger {{ session('error') ? '' : 'hidden' }}" id="error-message">
            {{ session('error') }}
        </div>
        @endif

    <table class="table">
        <thead>
            <tr>
            <th scope="col" class="titulo">N°</th>
            <th scope="col" class="titulo">Nombre</th>
            <th scope="col" class="titulo">Dirección</th>           
            <th scope="col" class="titulo">Correo</th>
            <th scope="col" class="titulo">Acciones</th>
            </tr>
        </thead>
        <tbody>
                @foreach($escuelas as $escuela)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $escuela->nombre }}</td>
                        <td>{{ $escuela->direccion }}</td>                       
                        <td>{{ $escuela->correo }}</td>
                        <td>                            
                            <a href="{{ Route('escuelas.edit', $escuela->id) }}" class="btn btn-warning">
                                <i class="bi bi-pencil"></i> Editar
                            </a>
                            <form method="POST" action="{{ route('escuelas.destroy', $escuela->id) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta escuela?')">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach    
        </tbody>
    </table>
    {{ $escuelas->links() }}
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
