@extends('adminlte::page')

@section('title', 'MIILE')

@section('content_header')
    <h1 class="m-0 text-dark">Editar inventarios</h1>
@stop

@section('content')
    <x-adminlte-card>
        <form method="POST" action="{{ route('inventarios.update', $inventarios->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre del inventarios"
                    fgroup-class="col-md-6" :value="$inventarios->nombre" />
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
                <x-adminlte-input name="cedula" label="Cédula" placeholder="Cédula del inventarios"
                    fgroup-class="col-md-6" :value="$inventarios->cedula" />
            </div>
            <div class="row">
                <x-adminlte-input name="direccion" label="Dirección" placeholder="Dirección del inventarios"
                    fgroup-class="col-md-6" :value="$inventarios->direccion" />
            </div>
            <div class="row">
                <x-adminlte-input name="telefono" label="Teléfono" placeholder="Teléfono del inventarios"
                    fgroup-class="col-md-6" :value="$inventarios->telefono" />
            </div>
            <div class="row">
                <x-adminlte-input name="email" label="Email" placeholder="Email del inventarios"
                    fgroup-class="col-md-6" :value="$inventarios->email" />
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
        <p><img src="{{ asset('vendor/adminlte/dist/img/fralgom-foot.png') }}" alt="Logo Fralgom"> © {{ date('Y') }} Fralgóm Ingeniería
            Informática. Todos los derechos reservados.</p>
    </footer>
@stop
