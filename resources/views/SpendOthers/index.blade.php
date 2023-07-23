@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Registrar monto de Accord</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('spendothers.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="amountac">Monto:</label>
                                <input type="text" name="amountac" id="amountac" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Registrar</button>
                            <a href="{{ route('spends.index') }}" class="btn btn-secondary">Volver</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3>Monto acumulado: ${{ session('amountac', 0) }}</h3>
                <!-- Resto del contenido de la vista -->
            </div>
        </div>
    </div>
@endsection
