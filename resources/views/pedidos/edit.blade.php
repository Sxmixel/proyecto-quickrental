@extends('adminlte::page')

@section('title', 'MIILE')

@section('content_header')
    <h1 class="m-0 text-dark">Editar pedidos</h1>
@stop

@section('content')
    <x-adminlte-card>
        <form method="POST" action="{{ route('pedidos.update', $pedidos->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre del usuario"
                    fgroup-class="col-md-4" :value="$pedidos->nombre" />
                 <x-adminlte-input name="telefono" label="Teléfono" type="tel"
                    fgroup-class="col-md-4" :value="$pedidos->telefono" />
                <x-adminlte-input name="email" label="Correo Electrónico" type="email"
                    fgroup-class="col-md-4" :value="$pedidos->email" />
            </div>

            <div class="row">
                <x-adminlte-input name="objeto" label="Objeto para alquilar" placeholder="Objeto del Pedido"
                    fgroup-class="col-md-4" :value="$pedidos->objeto" />
                <x-adminlte-input name="cantidad" label="Cantidad alquilada" type="number"
                    fgroup-class="col-md-4" :value="$pedidos->cantidad" />
                <x-adminlte-input name="tiempo" label="Tiempo alquilado" placeholder="Duración del Pedido"
                    fgroup-class="col-md-4" :value="$pedidos->tiempo" />
            </div>

            <div class="row">
                <x-adminlte-input name="dia" label="Fecha de entrega" type="date"
                    fgroup-class="col-md-4" :value="$pedidos->dia" />
                <x-adminlte-input name="hora" label="Hora de entrega" type="time"
                    fgroup-class="col-md-4" :value="$pedidos->hora" />
                <x-adminlte-input name="direccion" label="Dirección" placeholder="Dirección a entregar"
                    fgroup-class="col-md-4" :value="$pedidos->direccion" />
            </div>

            <div class="row">
                <x-adminlte-select name="estado" label="Estado del pedidos" fgroup-class="col-md-2">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-list"></i>
                        </div>
                    </x-slot>
                    <option value="">Seleccionar Estado</option>
                    <option value="Activo" {{ $pedidos->estado === 'Activo' ? 'selected' : '' }}>Activo</option>
                    <option value="Inactivo" {{ $pedidos->estado === 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                </x-adminlte-select>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <x-adminlte-button class="btn btn-success mr-2" type="submit" label="Guardar Cambios" theme="primary"
                        icon="fas fa-save" />
                    <a href="{{ route('pedidos.index') }}" class="btn btn-secondary mr-2">
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
