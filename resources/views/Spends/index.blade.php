@extends('layouts.app2')

@section('content')
<link rel="stylesheet" href="{{ asset('css/spend.css') }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('spends.create') }}" class="card-link">
                            <div class="card card-container">
                                <div class="card-body d-flex align-items-center">
                                    <img src="{{ asset('storage/images/efectivo.png') }}" alt="Efectivo">
                                    <h5 class="card-title">Efectivo</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('tarjetas.index') }}" class="card-link">
                            <div class="card card-container">
                                <div class="card-body d-flex align-items-center">
                                    <img src="{{ asset('storage/images/tarjetas.png') }}" alt="Tarjetas">
                                    <h5 class="card-title">Tarjetas</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('retiros.index') }}" class="card-link">
                            <div class="card card-container">
                                <div class="card-body d-flex align-items-center">
                                    <img src="{{ asset('storage/images/retiros.png') }}" alt="Retiros">
                                    <h5 class="card-title">Retiros</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('spends.create') }}" class="card-link">
                            <div class="card card-container">
                                <div class="card-body d-flex align-items-center">
                                    <img src="{{ asset('storage/images/tarjeta-propia.png') }}" alt="Tarjeta Propia">
                                    <h5 class="card-title">Tarjeta Propia</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('cupons.index') }}" class="card-link">
                            <div class="card card-container">
                                <div class="card-body d-flex align-items-center">
                                    <img src="{{ asset('storage/images/cupon.png') }}" alt="Cupón">
                                    <h5 class="card-title">Cupón</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('envases.index') }}" class="card-link">
                            <div class="card card-container">
                                <div class="card-body d-flex align-items-center">
                                    <img src="{{ asset('storage/images/envases.jpg') }}" alt="Envases">
                                    <h5 class="card-title">Envases</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
