@extends('layouts.app')

@section('content')
    <h1>Agregar Trabajador</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('workers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="rut">Rut</label>
            <input type="text" id="rut" name="rut" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" id="phone" name="phone" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="job">Puesto</label>
            <input type="text" id="job" name="job" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="local">Local</label>
            <input type="text" id="local" name="local" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('workers.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
