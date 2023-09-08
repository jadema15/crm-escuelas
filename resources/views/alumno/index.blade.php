<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}"></script>
@extends('../layouts.navbar') 
@section('content')


<div class="container">
    <div style="margin:2em">
        <h3>Alumnos</h3>
    </div>
    <div style="text-aling:center">
        <a href="{{ Route('alumnos.create') }}" class="btn btn-success" style="margin:0.5em">
             <i class="fas fa-trash"></i> Agregar
        </a>      
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">N°</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>           
            <th scope="col">Escuela</th>
            <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
                @foreach($alumnos as $alumno)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->apellido }}</td>                       
                        <td>{{ $alumno->escuela->nombre }}</td>
                        <td>                            
                            <a href="{{ Route('alumnos.edit', $alumno->id) }}" class="btn btn-warning">
                                <i class="bi bi-pencil"></i> Editar
                            </a>
                            <form method="POST" action="{{ route('alumnos.destroy', $alumno->id) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este Alumno?')">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>                       
                    </tr>
                @endforeach    
        </tbody>
    </table>
    {{ $alumnos->links() }}
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>