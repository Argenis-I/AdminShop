@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ route('spendcreditos.index') }}" class="btn btn-primary btn-lg btn-block">
                            Crédito
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('spenddebitos.index') }}" class="btn btn-primary btn-lg btn-block">
                            Débito
                        </a>
                    </div>
                </div>
            </div>
            <a href="{{ route('spends.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
