@extends('layouts.app')

@section('content')
    <h1>Editar Producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
        </div>
        <div class="form-group">
            <label for="barcode">Código de Barras:</label>
            <input type="text" name="barcode" id="barcode" class="form-control" value="{{ $product->barcode }}" required>
        </div>
        <div class="form-group">
            <label for="brand">Marca:</label>
            <input type="text" name="brand" id="brand" class="form-control" value="{{ $product->brand }}" required>
        </div>
        <div class="form-group">
            <label for="category">Categoría:</label>
            <input type="text" name="category" id="category" class="form-control" value="{{ $product->category }}" required>
        </div>
        <div class="form-group">
            <label for="supplier">Proveedor:</label>
            <input type="text" name="supplier" id="supplier" class="form-control" value="{{ $product->supplier }}" required>
        </div>
        <div class="form-group">
            <label for="cost">Costo:</label>
            <input type="number" name="cost" id="cost" class="form-control" step="0.01" value="{{ $product->cost }}" required>
        </div>
        <div class="form-group">
            <label for="price">Precio:</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ $product->price }}" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ $product->stock }}" required>
        </div>
        <div class="form-group">
            <label for="image">Imagen:</label>
            @if ($product->image)
                <div>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="100">
                </div>
            @endif
            <input type="file" name="image" id="image" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
