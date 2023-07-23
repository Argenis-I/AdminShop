@extends('layouts.app')

@section('content')
    <h1>Crear Producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="barcode">Código de Barras:</label>
            <input type="text" name="barcode" id="barcode" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="brand">Marca:</label>
            <input type="text" name="brand" id="brand" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category">Categoría:</label>
            <input type="text" name="category" id="category" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="supplier">Proveedor:</label>
            <input type="text" name="supplier" id="supplier" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cost">Costo:</label>
            <input type="number" name="cost" id="cost" class="form-control" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="price">Precio:</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" name="stock" id="stock" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Imagen:</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
