@extends('layouts.app')

@section('content')
    <h1>Editar Trabajador</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('workers.update', $worker->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $worker->name }}" required>
        </div>

        <div class="form-group">
            <label for="rut">Rut</label>
            <input type="text" id="rut" name="rut" class="form-control" value="{{ $worker->rut }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" id="phone" name="phone" class="form-control" value="{{ $worker->phone }}" required>
        </div>

        <div class="form-group">
            <label for="job">Puesto</label>
            <input type="text" id="job" name="job" class="form-control" value="{{ $worker->job }}" required>
        </div>

        <div class="form-group">
            <label for="local">Local</label>
            <input type="text" id="local" name="local" class="form-control" value="{{ $worker->local }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('workers.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
