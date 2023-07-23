@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Realizar retiro de efectivo</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('retiros.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nombre Trabajador:</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="amount">Monto a retirar:</label>
                                <input type="text" name="amount" id="amount" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Retirar</button>
                            <a href="{{ route('spends.index') }}" class="btn btn-secondary">Volver</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3>Monto acumulado: ${{ session('amount', 0) }}</h3>
                <!-- Resto del contenido de la vista -->
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h1>Retiros</h1>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Monto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($retiros as $retiro)
                <tr>
                    <td>{{ $retiro->id }}</td>
                    <td>{{ $retiro->name }}</td>
                    <td>${{ $retiro->amount }}</td>
                    <td>
                        <form action="{{ route('retiros.destroy', $retiro->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este retiro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
