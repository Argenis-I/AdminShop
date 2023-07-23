@extends('layouts.app')

@section('content')
    <h1>Agregar Orden</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="product">Producto</label>
            <input type="text" id="product" name="product" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="supplier">Proveedor</label>
            <input type="text" id="supplier" name="supplier" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="cost">Costo</label>
            <input type="text" id="cost" name="cost" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="price">Precio</label>
            <input type="text" id="price" name="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="amount">Cantidad</label>
            <input type="text" id="amount" name="amount" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
