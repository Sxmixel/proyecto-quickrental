@extends('adminlte::page')

@section('title', 'MIILE')

@section('content_header')
    <h1 class="m-0 text-dark">Detalle del Pedido</h1>
@stop

@section('content')
    <x-adminlte-card>
        <div class="row">
            <div class="col-md-4">
                <x-adminlte-info-box title="Nombre" text="{{ $pedidos->nombre }}" icon="fas fa-user" theme="info" />
            </div>
            <div class="col-md-4">
                <x-adminlte-info-box title="Teléfono" text="{{ $pedidos->telefono }}" icon="fas fa-phone" theme="info" />
            </div>
             <div class="col-md-4">
                <x-adminlte-info-box title="Correo Electrónico" text="{{ $pedidos->email }}" icon="fas fa-envelope" theme="info" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <x-adminlte-info-box title="Objeto alquilado" text="{{ $pedidos->objeto }}" icon="fas fa-boxes" theme="info" />
            </div>
            <div class="col-md-4">
                <x-adminlte-info-box title="Cantidad alquilada" text="{{ $pedidos->cantidad }}" icon="fas fa-hashtag" theme="info" />
            </div>
             <div class="col-md-4">
                <x-adminlte-info-box title="Tiempo alquilado" text="{{ $pedidos->tiempo }}" icon="far fa-clock" theme="info" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <x-adminlte-info-box title="Día de entrega" text="{{ $pedidos->dia }}" icon="far fa-calendar-alt" theme="info" />
            </div>
            <div class="col-md-4">
                <x-adminlte-info-box title="Hora de entrega" text="{{ $pedidos->hora }}" icon="fas fa-clock" theme="info" />
            </div>
             <div class="col-md-4">
                <x-adminlte-info-box title="Dirección" text="{{ $pedidos->direccion }}" icon="fas fa-map-marker-alt" theme="info" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <x-adminlte-info-box title="Estado" text="{{ $pedidos->estado }}" icon="fas fa-toggle-on" theme="info" />
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <a class="btn btn-secondary" href="{{ route('pedidos.index') }}"><i class="fas fa-undo"></i> Regresar</a>
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