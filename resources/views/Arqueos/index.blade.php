@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/arqueo.css') }}">
    <div class="container">
        <h1>Arqueo</h1>
        <div class="arqueo-container">
            <div class="arqueo-item">
                <span><b>Efectivo:</b></span>
                <span>${{ session('amount', 0) }}</span>
            </div>
            <div class="arqueo-item">
                <span><b>Débito:</b></span>
                <span>${{ session('amountd', 0) }}</span>
            </div>
            <div class="arqueo-item">
                <span><b>Crédito:</b></span>
                <span>${{ session('amountc', 0) }}</span>
            </div>
            <div class="arqueo-item">
                <span><b>Amipass:</b></span>
                <span>${{ session('amounta', 0) }}</span>
            </div>
            <div class="arqueo-item">
                <span><b>Sodexo:</b></span>
                <span>${{ session('amounts', 0) }}</span>
            </div>
            <div class="arqueo-item">
                <span><b>Accord:</b></span>
                <span>${{ session('amountac', 0) }}</span>
            </div>
            <div class="arqueo-item">
                <span><b>Total:</b></span>
                <span>${{ $totalAmount }}</span>
            </div>
        </div>
    </div>
@endsection
