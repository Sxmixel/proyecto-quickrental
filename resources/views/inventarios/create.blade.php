@extends('adminlte::page')

@section('title', 'MIILE')

@section('content_header')
    <h1 class="m-0 text-dark">Registrar Producto</h1>
@stop

@section('content')
    <x-adminlte-card>
        <form method="POST" action="{{ route('inventarios.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre del producto" fgroup-class="col-md-6" />
                <x-adminlte-input name="tamaño" label="Tamaño (kg)" placeholder="Si no aplica, colocar X" fgroup-class="col-md-6" />
            </div>

            <div class="row">
                <x-adminlte-input name="tiempo1" label="Precio por 24h/1h" type="number" placeholder="Si no aplica, colocar 0" fgroup-class="col-md-3" />
                <x-adminlte-input name="tiempo2" label="Precio por 48h/2h" type="number" placeholder="Si no aplica, colocar 0" fgroup-class="col-md-3" />
                <x-adminlte-input name="tiempo3" label="Precio por 72h/3h" type="number" placeholder="Si no aplica, colocar 0" fgroup-class="col-md-3" />
                <x-adminlte-input name="tiempo4" label="Precio por +4h" type="number" placeholder="Si no aplica, colocar 0" fgroup-class="col-md-3" />
            </div>

            <div class="row">
                <x-adminlte-input name="lavado" label="Costo del lavado" type="number" placeholder="Si no aplica, colocar 0" fgroup-class="col-md-6" />
                <x-adminlte-input name="deposito" label="Depósito inicial" type="number" placeholder="Si no aplica, colocar 0" fgroup-class="col-md-6" />
            </div>

            <div class="row">
                <x-adminlte-input name="cantidad" label="Cantidad total del producto" type="number" fgroup-class="col-md-6" />
                <x-adminlte-input name="disponible" label="Cantidad disponible del producto" type="number" fgroup-class="col-md-6" />
            </div>

            <div class="row">
                <x-adminlte-select name="estado" label="Estado del Producto" fgroup-class="col-md-2">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-list"></i>
                        </div>
                    </x-slot>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </x-adminlte-select>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <x-adminlte-button class="btn btn-primary mr-2" type="submit" label="Guardar Producto" theme="primary"
                        icon="fas fa-save" />
                    <a href="{{ route('inventarios.index') }}" class="btn btn-secondary mr-2"><i
                            class="fas fa-undo"></i> Cancelar</a>
                </div>
            </div>
        </form>
    </x-adminlte-card>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@stop

@section('footer')
    <footer>
        <p><img src="{{ asset('vendor/adminlte/dist/img/Icono-small.png') }}" alt="Logo Fralgom"> © {{ date('Y') }} Proyecto de técnica grado 11. Todos los derechos reservados.</p>
    </footer>
@stop
