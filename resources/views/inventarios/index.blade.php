@extends('adminlte::page')

@section('title', 'inventarios')

@section('content_header')
<h1 class="m-0 text-dark">Administración de inventarios</h1>
@stop

@section('content')
<x-adminlte-card>
    @can('crear-gastos')
    <a class="btn btn-primary mr-2" href="{{ route('inventarios.create') }}" role="button"><i class="fa fa-plus"></i> Nuevo Producto</a>
    @endcan

    <div class="card-body">
        @php
        $config['language'] = ['url' => asset('vendor/datatables/es-CO.json')];
        //$config['paging'] = true;
        //$config['lengthMenu'] = [10, 50, 100, 500];
        @endphp
        <x-adminlte-datatable id="table1" :heads="['ID', 'Nombre', 'Tamaño', '24h/1h', '48h/2h', '72h/3h', '+4h', 'Coste Lavado', 'Coste Depósito', 'Cantidad Total', 'Cantidad Disponible', 'Estado', 'Acciones']" head-theme="dark"
            :config=$config striped hoverable with-buttons>
            @foreach ($inventarios as $inventario)
            <tr>
                <td>{{ $inventario->id }}</td>
                <td>{{ $inventario->nombre }}</td>
                <td>{{ $inventario->tamaño }}</td>
                <td>{{ $inventario->tiempo1 }}</td>
                <td>{{ $inventario->tiempo2 }}</td>
                <td>{{ $inventario->tiempo3 }}</td>
                <td>{{ $inventario->tiempo4 }}</td>
                <td>{{ $inventario->lavado }}</td>
                <td>{{ $inventario->deposito }}</td>
                <td>{{ $inventario->cantidad }}</td>
                <td>{{ $inventario->disponible }}</td>
                <td>
                    @if ($inventario->estado == "Activo")
                    <h5><span class="badge badge-success">{{ $inventario->estado }}</span></h5>
                    @elseif ($inventario->estado == "Inactivo")
                    <h5><span class="badge badge-danger">{{ $inventario->estado }}</span></h5>
                    @endif
                </td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <a class="btn btn-info btn-sm" href="{{ route('inventarios.show', $inventario->id) }}">
                            <i class="far fa-eye"></i>
                        </a>
                        @can('editar-gastos')
                        <a class="btn btn-success btn-sm" href="{{ route('inventarios.edit', $inventario->id) }}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        @endcan
                        @can('borrar-gastos')
                        <form method="POST" action="{{ route('inventarios.destroy', $inventario->id) }}" class="delete-form" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-warning btn-sm delete-button">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                        @endcan
                    </div>
                </td>
            </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>
</x-adminlte-card>
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

<script>
var deleteButtons = document.querySelectorAll('.delete-button');
deleteButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        var form = this.parentElement;
        Swal.fire({
            title: "¿Estás seguro de Eliminar este inventario?",
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
