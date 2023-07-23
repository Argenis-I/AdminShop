@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Registrar monto de crédito</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('spendcreditos.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="amountc">Monto:</label>
                                <input type="text" name="amountc" id="amountc" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Registrar débito</button>
                            <a href="{{ route('spends.index') }}" class="btn btn-secondary">Volver</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3>Monto acumulado: ${{ session('amountc', 0) }}</h3>
                <!-- Resto del contenido de la vista -->
            </div>
        </div>
    </div>
@endsection
