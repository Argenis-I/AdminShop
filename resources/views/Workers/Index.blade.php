@extends('layouts.app')

@section('content')
    <h1>Lista de Trabajadores</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('workers.create') }}" class="btn btn-primary">Agregar Trabajador</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Rut</th>
                <th>Teléfono</th>
                <th>Puesto</th>
                <th>Local</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($workers as $worker)
                <tr>
                    <td>{{ $worker->name }}</td>
                    <td>{{ $worker->rut }}</td>
                    <td>{{ $worker->phone }}</td>
                    <td>{{ $worker->job }}</td>
                    <td>{{ $worker->local }}</td>
                    <td>
                        <a href="{{ route('workers.edit', $worker->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('workers.destroy', $worker->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este trabajador?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
