@extends('adminlte::page')

@section('title', 'IntranetPersoneria')

@section('content_header')
    <h1 style="text-align: center">Panel de Proveedores</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <x-adminlte-button label="Nuevo Proveedor" theme="success" icon="fas fa-key" class="float-right" data-toggle="modal"
                data-target="#modalPurpleA" />
        </div>

    </div>


    <!--CRITERIO DE BUSQUEDAD-->
    <div class="card">
        <div class="card-body">
            <h3>Criterio de busquedad</h3>
            <div class="row">
                <div class="col-3"><x-adminlte-input name="" id="iptnit" type="text" label="Nit"
                        placeholder="Nit" label-class="text-lightblue" value="" data-index="1">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-3"><x-adminlte-input name="" id="iptnombre" type="text" label="Nombre"
                        placeholder="Nombre" label-class="text-lightblue" value="" data-index="2">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-3"><x-adminlte-input name="" id="iptcontacto" type="text" label="Contacto"
                        placeholder="Contacto" label-class="text-lightblue" value="" data-index="5">
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

    <p>Bienvenido al panel de Proveedores</p>
    <div class="card">
        <div class="card-body">
            <table id="table6" class="table table-bordered table-striped tramites_table" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="bg-dark ">Id</th>
                        <th class="bg-dark " style="width: 150;">Nit</th>
                        <th class="bg-dark ">Nombre</th>
                        <th class="bg-dark ">Dirección</th>
                        <th class="bg-dark ">Teléfono</th>
                        <th class="bg-dark ">Contacto</th>
                        <th class="bg-dark ">Activo</th>
                        <th class="bg-dark">Opciones</th>

                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <!--ADICIONAR RADICADOS -->
    <x-adminlte-modal id="modalPurpleA" title="Adicionar Proveedor" theme="success" icon="fas fa-bolt" size='lg'
        disable-animations>
        <form action="{{ route('proveedores.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6"><x-adminlte-input name="nit_proveedor" id="nit_proveedor" type="text" label="NIT"
                        placeholder="NIT" label-class="text-lightblue" value="">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
            </div>
            <div class="row">
                <div class="col-6"><x-adminlte-input name="nombre" id="nombre" type="text" label="Nombre Proveedor"
                        placeholder="Nombre Proveedor" label-class="text-lightblue" value="">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-6"><x-adminlte-input name="direccion" id="direccion" type="text" label="Dirección"
                        placeholder="Dirección" label-class="text-lightblue" value="">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
            </div>

            <div class="row">

                <div class="col-3"><x-adminlte-input name="telefono" id="telefono" type="text" label="Teléfono"
                        placeholder="Teléfono" label-class="text-lightblue" value="">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-home text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-6"><x-adminlte-input name="contacto" id="contacto" type="text" label="Contacto"
                        placeholder="Contacto" label-class="text-lightblue" value="">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-home text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-3"><x-adminlte-select2 name="estado" label="Activo" label-class="text-lightblue"
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


            <x-adminlte-button class="btn-flat" type="submit" label="Guardar Proveedor" theme="success"
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
                "ajax": "{{ url('api/proveedores') }}",
                "columns": [{
                        data: 'id'
                    },
                    {
                        data: 'nit_proveedor'
                    },
                    {
                        data: 'nombre'
                    },
                    {
                        data: 'direccion'
                    },
                    {
                        data: 'telefono'
                    },
                    {
                        data: 'contacto'
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
                        data: 'btnE'
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
            $('#iptnit').keyup(function() {
                table.columns($(this).data('index')).search(this.value).draw();
            })
            $('#iptnombre').keyup(function() {
                table.columns($(this).data('index')).search(this.value).draw();
            })
            $('#iptcontacto').keyup(function() {
                table.columns($(this).data('index')).search(this.value).draw();
            })

        });
    </script>

@stop
