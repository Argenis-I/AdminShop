@extends('layouts.app')

@section('content')
    <h1>Editar Cliente</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $client->name }}" required>
        </div>
        <div class="form-group">
            <label for="rut">RUT:</label>
            <input type="text" name="rut" id="rut" class="form-control" value="{{ $client->rut }}" required>
        </div>
        <div class="form-group">
            <label for="comment">Comentario:</label>
            <textarea name="comment" id="comment" class="form-control">{{ $client->comment }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
