@extends('adminlte::page')

@section('title', 'pedidos')

@section('content_header')
<h1 class="m-0 text-dark">Administración de pedidos</h1>
@stop

@section('content')
<x-adminlte-card>
    @can('crear-gastos')
    <a class="btn btn-primary mr-2" href="{{ route('pedidos.create') }}" role="button"><i class="fa fa-plus"></i> Nuevo Pedido</a>
    @endcan

    <div class="card-body">
        @php
        $config['language'] = ['url' => asset('vendor/datatables/es-CO.json')];
        //$config['paging'] = true;
        //$config['lengthMenu'] = [10, 50, 100, 500];
        @endphp
        <x-adminlte-datatable id="table1" :heads="['ID', 'Nombre', 'Telefono', 'Email', 'Objeto Alquilado', 'Cantidad Alquilada', 'Tiempo de Alquiler', 'Fecha de entrega', 'Hora de entrega', 'Dirección', 'Estado', 'Acciones']" head-theme="dark"
            :config=$config striped hoverable with-buttons>
            @foreach ($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->id }}</td>
                <td>{{ $pedido->nombre }}</td>
                <td>{{ $pedido->telefono }}</td>
                <td>{{ $pedido->email }}</td>
                <td>{{ $pedido->objeto }}</td>
                <td>{{ $pedido->cantidad }}</td>
                <td>{{ $pedido->tiempo }}</td>
                <td>{{ $pedido->dia }}</td>
                <td>{{ $pedido->hora }}</td>
                <td>{{ $pedido->direccion }}</td>
                <td>
                    @if ($pedido->estado == "Activo")
                    <h5><span class="badge badge-success">{{ $pedido->estado }}</span></h5>
                    @elseif ($pedido->estado == "Inactivo")
                    <h5><span class="badge badge-danger">{{ $pedido->estado }}</span></h5>
                    @endif
                </td>
                <td>
                    <a class="btn btn-info" href="{{ route('pedidos.show', $pedido->id) }}" role="button">
                        <i class="far fa-eye fa-fw"></i></a>
                    @can('editar-gastos')
                    <a class="btn btn-success" href="{{ route('pedidos.edit', $pedido->id) }}"
                        role="button">
                        <i class="fas fa-pencil-alt fa-fw"></i></a>
                    @endcan
                    @can('borrar-gastos')
                    <form method="POST" action="{{ route('pedidos.destroy', $pedido->id) }}"
                        style="display: inline;" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-warning delete-button">
                            <i class="far fa-trash-alt fa-fw"></i>
                        </button>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>
</x-adminlte-card>
@stop

@section('footer')
<footer>
    <p><img src="{{ asset('vendor/adminlte/dist/img/fralgom-foot.png') }}" alt="Logo Fralgom"> © {{ date('Y') }} Proyecto de técnica grado 11. Todos los derechos reservados.</p>
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

<script>
var deleteButtons = document.querySelectorAll('.delete-button');
deleteButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        var form = this.parentElement;
        Swal.fire({
            title: "¿Estás seguro de Eliminar este pedido?",
            text: "¡No se podrá recuperar la información!",
            icon: "error",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "¡Sí, Eliminar!"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        })
    });
});
</script>
@stop
