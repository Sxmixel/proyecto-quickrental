@extends('adminlte::page')

@section('title', 'MIILE')

@section('content_header')
    <h1 class="m-0 text-dark">Registrar Pedido</h1>
@stop

@section('content')
    <x-adminlte-card>
        <form method="POST" action="{{ route('pedidos.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre del usuario" fgroup-class="col-md-4" />
                <x-adminlte-input name="telefono" label="Teléfono" type="tel" fgroup-class="col-md-4" />
                <x-adminlte-input name="email" label="Correo Electrónico" type="email" fgroup-class="col-md-4" />
            </div>

            <div class="row">
                <x-adminlte-input name="objeto" label="Objeto para alquilar" placeholder="Objeto del Pedido" fgroup-class="col-md-4" />
                <x-adminlte-input name="cantidad" label="Cantidad alquilada" type="number" fgroup-class="col-md-4" />
                <x-adminlte-input name="tiempo" label="Tiempo alquilado" placeholder="Duración del Pedido" fgroup-class="col-md-4" />
            </div>

            <div class="row">
                <x-adminlte-input name="dia" label="Fecha de entrega" type="date" fgroup-class="col-md-4" />
                <x-adminlte-input name="hora" label="Hora de entrega" type="time" fgroup-class="col-md-4" />
                <x-adminlte-input name="direccion" label="Dirección" placeholder="Dirección a entregar" fgroup-class="col-md-4" />
            </div>

            <div class="row">
                <x-adminlte-select name="estado" label="Estado del Pedido" fgroup-class="col-md-2">
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
                    <x-adminlte-button class="btn btn-primary mr-2" type="submit" label="Guardar Pedido" theme="primary"
                        icon="fas fa-save" />
                    <a href="{{ route('pedidos.index') }}" class="btn btn-secondary mr-2"><i
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
