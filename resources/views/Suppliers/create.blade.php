
@extends('layouts.app')

@section('content')
    <h1>Crear Proveedor</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address">Dirección:</label>
            <input type="text" name="address" id="address" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="item">Item:</label>
            <input type="text" name="item" id="item" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="associated">Asociado:</label>
            <input type="text" name="associated" id="associated" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="comment">Comentario:</label>
            <textarea name="Comment" id="comment" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
