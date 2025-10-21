@extends('adminlte::page')

@section('title', 'MIILE')

@section('content_header')
    <h1 class="m-0 text-dark">Detalles del producto</h1>
@stop

@section('content')
    <x-adminlte-card>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-info-box title="Nombre" text="{{ $inventarios->nombre }}" icon="fas fa-box" theme="info" />
            </div>
            <div class="col-md-6">
                <x-adminlte-info-box title="Tamaño/Peso" text="{{ $inventarios->tamaño }}" icon="fas fa-balance-scale" theme="info" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <x-adminlte-info-box title="24h/1h" text="{{ $inventarios->tiempo1 }}" icon="far fa-clock" theme="info" />
            </div>
            <div class="col-md-3">
                <x-adminlte-info-box title="48h/2h" text="{{ $inventarios->tiempo2 }}" icon="far fa-clock" theme="info" />
            </div>
            <div class="col-md-3">
                <x-adminlte-info-box title="72h/3h" text="{{ $inventarios->tiempo3 }}" icon="far fa-clock" theme="info" />
            </div>
             <div class="col-md-3">
                <x-adminlte-info-box title="+4h" text="{{ $inventarios->tiempo4 }}" icon="far fa-clock" theme="info" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <x-adminlte-info-box title="Coste del Lavado" text="{{ $inventarios->lavado }}" icon="fas fa-shower" theme="info" />
            </div>
            <div class="col-md-3">
                <x-adminlte-info-box title="Coste del Depósito Incial" text="{{ $inventarios->deposito }}" icon="fas fa-money-bill" theme="info" />
            </div>
             <div class="col-md-3">
                <x-adminlte-info-box title="Cantidad Total" text="{{ $inventarios->cantidad }}" icon="fas fa-boxes" theme="info" />
            </div>
            <div class="col-md-3">
                <x-adminlte-info-box title="Cantidad Disponible" text="{{ $inventarios->disponible }}" icon="fas fa-clipboard-check" theme="info" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <x-adminlte-info-box title="Estado" text="{{ $inventarios->estado }}" icon="fas fa-toggle-on" theme="info" />
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <a class="btn btn-secondary" href="{{ route('inventarios.index') }}"><i class="fas fa-undo"></i> Regresar</a>
            </div>
        </div>
    </x-adminlte-card>
@stop

@section('footer')
    <footer>
        <p><img src="{{ asset('vendor/adminlte/dist/img/fralgom-foot.png') }}" alt="Logo Fralgom"> © {{ date('Y') }}
            Fralgóm Ingeniería
            Informática. Todos los derechos reservados.</p>
    </footer>
@stop