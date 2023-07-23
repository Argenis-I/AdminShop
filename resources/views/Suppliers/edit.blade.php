<!-- resources/views/suppliers/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Editar Proveedor</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $supplier->name }}" required>
        </div>
        <div class="form-group">
            <label for="address">Dirección:</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $supplier->address }}" required>
        </div>
        <div class="form-group">
            <label for="item">Item:</label>
            <input type="text" name="item" id="item" class="form-control" value="{{ $supplier->item }}" required>
        </div>
        <div class="form-group">
            <label for="associated">Asociado:</label>
            <input type="text" name="associated" id="associated" class="form-control" value="{{ $supplier->associated }}" required>
        </div>
        <div class="form-group">
            <label for="comment">Comentario:</label>
            <textarea name="Comment" id="comment" class="form-control" required>{{ $supplier->Comment }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
