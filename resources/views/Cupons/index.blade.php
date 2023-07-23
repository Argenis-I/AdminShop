@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ route('spendothers.index') }}" class="btn btn-primary btn-lg btn-block">
                            Accord
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('spendsodexos.index') }}" class="btn btn-primary btn-lg btn-block">
                            Sodexo
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('spendamipasss.index') }}" class="btn btn-primary btn-lg btn-block">
                            Amipass
                        </a>
                    </div>
                </div>
            </div>
            <a href="{{ route('spends.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
