@extends('adminlte::page')

@section('title', 'MIILE')

@section('content_header')
<h1 class="m-0 text-dark">Manejo de Ingresos e Inventario de Líquido y Envase</h1>
@stop

@section('content')
<div class="row">
    <div class="col text-right">
        <h4>Día Actual : {{ now()->format('d/m/Y') }}</h4>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-cyan">
            <div class="inner">
                <h3>123</h3>
                <p>Entradas</p>
            </div>
            <div class="icon">
                <i class="fas fa-sign-in-alt"></i>
            </div>
            <a href="{{ route('gastos.index') }}" class="small-box-footer">
                Más detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>321</h3>
                <p>Salidas</p>
            </div>
            <div class="icon">
                <i class="fas fa-sign-out-alt"></i>
            </div>
            <a href="{{ route('gastos.index') }}" class="small-box-footer">
                Más detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3>456</h3>
                <p>Inventario</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-tag"></i>
            </div>
            <a href="{{ route('inventarios.index') }}" class="small-box-footer">
                Más detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>654</h3>
                <p>Pedidos</p>
            </div>
            <div class="icon">
                <i class="fas fa-handshake"></i>
            </div>
            <a href="{{ route('pedidos.index') }}" class="small-box-footer">
                Más detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@stop

@section('footer')
<footer>
    <p><img src="{{ asset('vendor/adminlte/dist/img/Icono-small.png') }}" alt="Logo Fralgom"> © {{ date('Y') }} Proyecto de técnica grado 11. Todos los derechos reservados.</p>
</footer>
@stop

@section('js')
@if ($message = Session::get('success'))
<script>
Swal.fire({
    title: "Operación Exitosa!",
    text: "{{ $message }}",
    timer: 2000,
    icon: "success"
});
</script>
@endif
@stop
