@extends('adminlte::page')

@section('title', 'IntranetPersoneria')

@section('content_header')
    <h1 style="text-align: center">Panel de Clientes</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <x-adminlte-button label="Nuevo Cliente" theme="success" icon="fas fa-key" class="float-right" data-toggle="modal"
                data-target="#modalPurpleA" />
        </div>

    </div>


    <!--CRITERIO DE BUSQUEDAD-->
    <div class="card">
        <div class="card-body">
            <h3>Criterio de busquedad</h3>
            <div class="row">
                <div class="col-3">
                    <x-adminlte-input name="" id="iptnombre" type="text" label="Nombre" placeholder="Nombre"
                        label-class="text-lightblue" value="" data-index="1">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-3"><x-adminlte-input name="" id="iptdependencia" type="text" label="Dependencia"
                        placeholder="Dependencia" label-class="text-lightblue" value="" data-index="2">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
            </div>
        </div>
    </div>

    <p>Bienvenido al panel de Clientes</p>
    <div class="card">
        <div class="card-body">
            <table id="table6" class="table table-bordered table-striped tramites_table" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="bg-dark ">Cédula</th>
                        <th class="bg-dark ">Nombre</th>
                        <th class="bg-dark ">Dependencia</th>
                        <th class="bg-dark ">Activo</th>
                        <th class="bg-dark">Opciones</th>

                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <!--ADICIONAR CLIENTES -->
    <x-adminlte-modal id="modalPurpleA" title="Adicionar Cliente" theme="success" icon="fas fa-bolt" size='lg'
        disable-animations>
        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6"><x-adminlte-input name="nombre" id="nombre" type="text" label="Nombre Cliente"
                        placeholder="Nombre Cliente" label-class="text-lightblue" value="">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-4"><x-adminlte-input name="cedula" id="cedula" type="text" label="Cédula Cliente"
                        placeholder="Cédula Cliente" label-class="text-lightblue" value="">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
            </div>
            <div class="row">
                <div class="col-6"><x-adminlte-input name="dependencia" id="dependencia" type="text" label="Dependencia"
                        placeholder="Dependencia" label-class="text-lightblue" value="">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-3"><x-adminlte-select2 name="estado" label="Estado" label-class="text-lightblue"
                        igroup-size="lg">
                        <x-slot name="prependSlot">
                            <div class="input-group-text ">
                                <i class="fa fa-flag text-lightblue"></i>
                            </div>
                        </x-slot>
                        <option>Activo</option>
                        <option>Inactivo</option>
                    </x-adminlte-select2>
                </div>
            </div>

            <x-adminlte-button class="btn-flat" type="submit" label="Guardar Cliente" theme="success"
                icon="fas fa-lg fa-save" />
        </form>

    </x-adminlte-modal>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @if (session('message'))
        <script>
            $(document).ready(function() {
                let mensaje = "{{ session('message') }}";
                Swal.fire({
                    title: "Resultado",
                    text: mensaje,
                    icon: "success"
                });
            })
        </script>
    @endif

    <script>
        $(document).ready(function() {
            let table = $('#table6').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                "ordering": true,
                "order": [
                    [1, 'desc']
                ],
                "ajax": "{{ url('api/clientes') }}",
                "columns": [{
                        data: 'cliente_id'
                    },
                    {
                        data: 'nombre'
                    },
                    {
                        data: 'dependencia'
                    },
                    {
                        data: 'estado',
                        render: function(data, type, row) {
                            if (data == 'Activo') {
                                color = 'green';
                            } else if (data == 'Inactivo') {
                                color = 'red';
                            }
                            return '<span class="p-1 text-white rounded-sm" style=" background:' +
                                color +
                                '">' + data +
                                '</span>';
                        }

                    },
                    {
                        data: 'btnC'
                    },
                ],
                "language": {
                    "info": "Mostrando  _END_ registros de _TOTAL_ Trámites",
                    "search": "Buscar",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": true,
                    "lengthMenu": 'Mostrar <select>' +
                        '<option value="10">10</option>' +
                        '<option value="20">20</option>' +
                        '<option value="50">50</option>' +
                        '<option value="100">100</option>' +
                        '<option value="200">200</option>' +
                        '<option value="400">400</option>' +
                        '<option value="600">600</option>' +
                        '<option value="800">800</option>' +
                        '<option value="1000">1000</option>' +
                        '</select> registros____    ',
                    "loadingRecords": "Cargando registros.....",
                    "processing": "Procesando.....",
                    "emptyTable": "No hay datos....",
                    "zeroRecords": "No hay coincidencias.....",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Trámites",
                    "infoFiltered": "(Filtrado de _MAX_ _total_ Trámites)",
                }
            });

            //Eventos criterios de busquedad
            $('#iptnombre').keyup(function() {
                table.columns($(this).data('index')).search(this.value).draw();
            })
            $('#iptdependencia').keyup(function() {
                table.columns($(this).data('index')).search(this.value).draw();
            })


        });
    </script>

@stop
