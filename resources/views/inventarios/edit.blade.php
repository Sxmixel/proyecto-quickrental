@extends('adminlte::page')

@section('title', 'MIILE')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Producto</h1>
@stop

@section('content')
    <x-adminlte-card>
        <form method="POST" action="{{ route('inventarios.update', $inventarios->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre del producto"
                    fgroup-class="col-md-6" :value="$inventarios->nombre" />
                <x-adminlte-input name="tamaño" label="Tamaño" placeholder="Tamaño del producto (g)"
                    fgroup-class="col-md-6" :value="$inventarios->tamaño" />
            </div>

            <div class="row">
                <x-adminlte-input name="tiempo1" label="24h/1h" placeholder="Precio por 24h/1h"
                    fgroup-class="col-md-3" :value="$inventarios->tiempo1" />
                <x-adminlte-input name="tiempo2" label="48h/2h" placeholder="Precio por 48h/2h"
                    fgroup-class="col-md-3" :value="$inventarios->tiempo2" />
                <x-adminlte-input name="tiempo3" label="72h/3h" placeholder="Precio por 72h/3h"
                    fgroup-class="col-md-3" :value="$inventarios->tiempo3" />
                <x-adminlte-input name="tiempo4" label="+4h" placeholder="Precio por +4h"
                    fgroup-class="col-md-3" :value="$inventarios->tiempo4" />
            </div>

            <div class="row">
                <x-adminlte-input name="lavado" label="Coste Lavado" placeholder="Precio del lavado del producto"
                    fgroup-class="col-md-6" :value="$inventarios->lavado" />
                <x-adminlte-input name="deposito" label="Coste Depósito" placeholder="Precio del depósito incial"
                    fgroup-class="col-md-6" :value="$inventarios->deposito" />
            </div>

            <div class="row">
                <x-adminlte-input name="cantidad" label="Cantidad Total" placeholder="Cantidad total de productos"
                    fgroup-class="col-md-6" :value="$inventarios->cantidad" />
                <x-adminlte-input name="disponible" label="Cantidad Disponible" placeholder="Cantidad de producto disponible"
                    fgroup-class="col-md-6" :value="$inventarios->disponible" />
            </div>

            <div class="row">
                <x-adminlte-select name="estado" label="Estado del inventarios" fgroup-class="col-md-2">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-list"></i>
                        </div>
                    </x-slot>
                    <option value="">Seleccionar Estado</option>
                    <option value="Activo" {{ $inventarios->estado === 'Activo' ? 'selected' : '' }}>Activo</option>
                    <option value="Inactivo" {{ $inventarios->estado === 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                </x-adminlte-select>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <x-adminlte-button class="btn btn-success mr-2" type="submit" label="Guardar Cambios" theme="primary"
                        icon="fas fa-save" />
                    <a href="{{ route('inventarios.index') }}" class="btn btn-secondary mr-2">
                        <i class="fas fa-undo"></i> Cancelar
                    </a>
                </div>
            </div>
        </form>
    </x-adminlte-card>
@stop

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@section('footer')
    <footer>
        <p><img src="{{ asset('vendor/adminlte/dist/img/Icono-small.png') }}" alt="Logo Fralgom"> © {{ date('Y') }} Proyecto de técnica grado 11. Todos los derechos reservados.</p>
    </footer>
@stop
