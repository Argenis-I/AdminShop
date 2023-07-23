@extends('layouts.app')

@section('content')
    <h1>Lista de Órdenes</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary">Agregar Orden</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Proveedor</th>
                <th>Costo</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total del Costo</th>
                <th>Total del Precio</th>
                <th>Ganancias</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->product }}</td>
                    <td>{{ $order->supplier }}</td>
                    <td>{{ intval($order->cost) }}</td>
                    <td>{{ intval($order->price) }}</td>
                    <td>{{ $order->amount }}</td>
                    <td>{{ $order->cost * $order->amount }}</td>
                    <td>{{ $order->price * $order->amount }}</td>
                    <td>{{ ($order->price * $order->amount) - ($order->cost * $order->amount) }}</td>
                    <td>
                        <a href="{{ route('orders.edit', $order) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('orders.destroy', $order) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta orden?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
