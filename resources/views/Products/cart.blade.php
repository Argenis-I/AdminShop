@extends('layouts.app3')

@section('content')
    <h1 class="text-center">Carro de Compras</h1>
    <br>
    @foreach ($cartData as $item)
        <div class="product-item">
            <a href="{{ route('products.cart', ['product' => $item['product']->id]) }}">
                @if ($item['product']->image)
                    <img src="{{ asset('storage/' . $item['product']->image) }}" alt="{{ $item['product']->name }}" class="product-image">
                @else
                    <img src="{{ asset('images/default-image.jpg') }}" alt="{{ $item['product']->name }}" class="product-image">
                @endif
            </a>
            <h3 class="product-name">{{ $item['product']->name }}</h3>
            <p class="product-price"><b>$ {{ $item['product']->price }}</b></p>

            <div class="quantity">
                <button class="decrease-btn" data-product="{{ $item['product']->id }}">-</button>
                <span class="quantity-value">{{ $item['quantity'] }}</span>
                <button class="increase-btn" data-product="{{ $item['product']->id }}">+</button>
            </div>
            <p>Subtotal: <span class="subtotal" data-price="{{ $item['product']->price * $item['quantity'] }}">{{ $item['subtotal'] }}</span></p>
            <a href="{{ route('transbank.index', ['price' => $item['product']->price, 'quantity' => $item['quantity']]) }}" class="btn btn-primary">Comprar</a>
        </div>
    @endforeach

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Evento para decrementar la cantidad
            $('.decrease-btn').on('click', function() {
                var quantityElement = $(this).siblings('.quantity-value');
                var subtotalElement = $(this).closest('.product-item').find('.subtotal');
                var quantity = parseInt(quantityElement.text());
                if (quantity > 1) {
                    quantity--;
                    quantityElement.text(quantity);
                    var price = parseInt(subtotalElement.data('price'));
                    var subtotal = price * quantity;
                    subtotalElement.text(subtotal);
                }
            });

            // Evento para incrementar la cantidad
            $('.increase-btn').on('click', function() {
                var quantityElement = $(this).siblings('.quantity-value');
                var subtotalElement = $(this).closest('.product-item').find('.subtotal');
                var quantity = parseInt(quantityElement.text());
                quantity++;
                quantityElement.text(quantity);
                var price = parseInt(subtotalElement.data('price'));
                var subtotal = price * quantity;
                subtotalElement.text(subtotal);
            });
        });
    </script>

    <style>
        .product-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-bottom: 20px;
        }

        .product-image {
            border: 1px solid #ccc;
            width: 271px;
            height: 271px;
            object-fit: fill;
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
