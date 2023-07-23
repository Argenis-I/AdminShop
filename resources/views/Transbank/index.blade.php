@extends('layouts.app3')

@section('content')
    <h1>Pago con Transbank</h1>

    <h3>Detalles de la compra:</h3>
    <p>Precio: {{ $price }}</p>
    <p>Cantidad: {{ $quantity }}</p>

    <form action="{{ route('transbank.confirmar_pago') }}" method="POST">
        @csrf
        <input type="hidden" name="price" value="{{ $price }}">
        <input type="hidden" name="quantity" value="{{ $quantity }}">
        <button type="submit">Confirmar Pago</button>
    </form>
@endsection
