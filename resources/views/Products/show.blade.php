@extends('layouts.app3')

@section('content')
    <h1>Bienvenido a nuestra tienda</h1>

    <!-- Filtro de categorías -->
    <form method="GET">
        @csrf
        <label for="category">Filtrar por categoría:</label>
        <select name="category" id="category">
            <option value="">Todas las categorías</option>
            @foreach ($categories as $category)
                <option value="{{ $category }}" {{ $selectedCategory == $category ? 'selected' : '' }}>{{ $category }}</option>
            @endforeach
        </select>
        <button type="submit">Filtrar</button>
    </form>
    <br>
    <!-- Productos en cuadros -->
    <div class="product-grid">
        @foreach ($products as $product)
            <div class="product-item">
                <a href="{{ route('products.cart', ['product' => $product->id]) }}">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                    @else
                        <img src="{{ asset('images/default-image.jpg') }}" alt="{{ $product->name }}" class="product-image">
                    @endif
                </a>
                <h3 class="product-name">{{ $product->name }}</h3>
                <p class="product-price"><b>$ {{ $product->price }}</b></p>
            </div>
        @endforeach
    </div>

    <!-- Mostrar cantidad de productos en el carrito -->
    <p>Cantidad de productos en el carrito: {{ $cartCount }}</p>

    <!-- Resto del contenido de la página welcome -->

    <style>
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }

        .product-item {
            flex: 0 0 180px;
            margin-right: 20px;
            margin-bottom: 20px;
            text-align: center;
        }

        .product-image {
            border: 1px solid #ccc;
            width: 181px;
            height: 207px;
            object-fit:fill;
        }

        .product-name {
            margin-top: 10px;
            margin-bottom: 5px;
            font-weight: normal;
        }

        .product-price {
            font-weight: bold;
        }
    </style>
@endsection
