@extends('adminlte::page')

@section('title', 'IntranetPersoneria')

@section('content_header')
    <h1>Listado de Pedidos </h1>
@stop

@section('content')
    <p>Bienvenido al panel de Pedidos</p>
        <div class="card">

        <div class="card-body">
            @php
                $heads = [
                    'pedido_id',
                    'subtotal',
                    'impuesto',
                    'total',
                    'Estado'
                    ['label' => 'Opciones', 'no-export' => true, 'width' => 10],
                ];

                $btnEdit = '';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </button>';

                $config = [
                    'language' => [
                        'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                    ],
                ];
            @endphp


            <x-adminlte-datatable id="table6" head-theme="light" theme="dark" :heads="$heads" :config="$config" striped
                hoverable with-footer footer-theme="light" beautify>

                @foreach ($pedidos as $pedido)
                    <tr>
                        <td> {{ $pedido->pedido_id }} </td>
                        <td>{{ $pedido->subtotal }}</td>
                        <td>{{ $pedido->impuesto }}</td>
                        <td>{{ $pedido->total }}</td>
                        <td>{{ $pedido->estado }}</td>
                        <td><a href="  " type="submit"
                                class="btn btn-xs btn-default text-success mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            <form action="" method="POST" class="formEliminar">
                                @csrf
                                @method('delete')
                                {!! $btnDelete !!}
                            </form>
                        </td>
                    </tr>
                @endforeach

            </x-adminlte-datatable>
        </div>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.formEliminar').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Esta seguro?",
                    text: "Vas a eliminar un registro!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            })
        })
    </script>
@stop
