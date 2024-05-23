@extends('adminlte::page')

@section('title', 'IntranetPersoneria')

@section('content_header')
    <h1 style="text-align: center">Panel de Productos</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <x-adminlte-button label="Nuevo Producto" theme="success" icon="fas fa-key" class="float-right" data-toggle="modal"
                data-target="#modalPurpleA" />
        </div>

    </div>


    <!--CRITERIO DE BUSQUEDAD-->
    <div class="card">
        <div class="card-body">
            <h3>Criterio de busquedad</h3>
            <div class="row">

                <div class="col-2"><x-adminlte-input name="" id="iptcodbarra" type="text"
                        label="Codigo de barras" placeholder="Codigo de barras" label-class="text-lightblue" value=""
                        data-index="3">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-2"><x-adminlte-input name="" id="iptnombre" type="text" label="Nombre"
                        placeholder="Nombre" label-class="text-lightblue" value="" data-index="4">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-3"><x-adminlte-input name="" id="iptproveedor" type="text" label="Proveedor"
                        placeholder="Proveedor" label-class="text-lightblue" value="" data-index="7">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-2"><x-adminlte-input name="" id="iptstock" type="text" label="Existencia"
                        placeholder="Existencia" label-class="text-lightblue" value="" data-index="1">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-2"><x-adminlte-input name="" id="iptcategoria" type="text" label="Categoría"
                        placeholder="Categoría" label-class="text-lightblue" value="" data-index="8">
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

    <p>Bienvenido al panel de Productos</p>
    <div class="card">
        <div class="card-body">
            <table id="table6" class="table table-bordered table-striped tramites_table" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="bg-dark ">Id</th>
                        <th class="bg-dark ">Stock</th>
                        <th class="bg-dark ">Imágen</th>
                        <th class="bg-dark ">Cod_Barra</th>
                        <th class="bg-dark ">Nombre</th>
                        <th class="bg-dark ">Precio</th>
                        <th class="bg-dark ">Descripción</th>
                        <th class="bg-dark ">Proveedor</th>
                        <th class="bg-dark ">Categoría</th>
                        <th class="bg-dark ">Estado</th>
                        <th class="bg-dark">Opciones</th>

                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <!--ADICIONAR PRODUCTOS -->
    <x-adminlte-modal id="modalPurpleA" title="Adicionar Producto" theme="success" icon="fas fa-bolt" size='lg'
        disable-animations>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-4"><x-adminlte-input name="cod_barra" id="cod_barra" type="text"
                        label="Codigo de Barras" placeholder="Codigo de Barras" label-class="text-lightblue"
                        value="">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-5">
                    <x-adminlte-select2 name="categoria" label="Categoría" label-class="text-lightblue"
                        igroup-size="lg">
                        <x-slot name="prependSlot">
                            <div class="input-group-text ">
                                <i class="fa fa-graduation-cap text-lightblue"></i>
                            </div>
                        </x-slot>
                        <option>Selecciona la Categoría</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->nombre }}">{{ $categoria->nombre }}</option>
                        @endforeach

                    </x-adminlte-select2>

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
            <div class="row">
                <div class="col-6"><x-adminlte-input name="nombre" id="nombre" type="text"
                        label="Nombre Producto" placeholder="Nombre Producto" label-class="text-lightblue"
                        value="">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-3"><x-adminlte-input name="precio" id="precio" type="text" label="Precio"
                        placeholder="Precio" label-class="text-lightblue" value="">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-2"><x-adminlte-input name="impuesto" id="impuesto" type="text"
                        label="Impuesto(IVA)" placeholder="(IVA)" label-class="text-lightblue" value="">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <x-adminlte-textarea name="descripcion" label="descripcion" rows=5 label-class="text-lightblue"
                        igroup-size="sm" placeholder="Descripción Producto...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                            </div>
                        </x-slot>

                    </x-adminlte-textarea>
                </div>
            </div>
            <div class="row">

                <div class="col-7">
                    <x-adminlte-select2 name="proveedor" label="proveedor" label-class="text-lightblue"
                        igroup-size="lg">
                        <x-slot name="prependSlot">
                            <div class="input-group-text ">
                                <i class="fa fa-graduation-cap text-lightblue"></i>
                            </div>
                        </x-slot>
                        <option>Selecciona el Proveedor</option>
                        @foreach ($proveedores as $proveedor)
                            <option value="{{ $proveedor->nombre }}">{{ $proveedor->nombre }}</option>
                        @endforeach

                    </x-adminlte-select2>

                </div>
                <div class="col-3"><x-adminlte-input name="placa" id="placa" type="text"
                        label="Placa Inventario" placeholder="Placa Inventario" label-class="text-lightblue"
                        value="">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-2">
                    <x-adminlte-input type="number" min="1" max="10000" name="stock"
                        id="stock" label="Stock" placeholder="Stock" label-class="text-lightblue" value="">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
            </div>
            <div class="row">
                <div class="col-8">

                    <x-adminlte-input accept="image/*" name="imagen" type="file" label="Imagen Producto"
                        label-class="text-lightblue" value="" onchange="previewImage(event, '#imgPreview')">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-file text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                </div>

                <div class="col-4">
                    <div class="card-body">
                        <img style="margin: auto;width:100px; heigth:100px" id="imgPreview" src=""
                            alt="">
                    </div>
                </div>

                <x-adminlte-button class="btn-flat" type="submit" label="Guardar Producto" theme="success"
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
                    text: mensaje,
                    icon: "success"
                });
            })
        </script>
    @endif

    @if (session('messageEliminar'))
        <script>
            $(document).ready(function() {
                let mensaje = "{{ session('message') }}";
                Swal.fire({
                    title: "Eliminar!",
                    icon: "success"
                });
            })
        </script>
    @endif

    <script>
        //cargar previsualizacion de imagen

        function previewImage(event, querySelector) {

            //Recuperamos el input que desencadeno la acción
            const input = event.target;

            //Recuperamos la etiqueta img donde cargaremos la imagen
            $imgPreview = document.querySelector(querySelector);

            // Verificamos si existe una imagen seleccionada
            if (!input.files.length) return

            //Recuperamos el archivo subido
            file = input.files[0];

            //Creamos la url
            objectURL = URL.createObjectURL(file);

            //Modificamos el atributo src de la etiqueta img
            $imgPreview.src = objectURL;

        }
    </script>

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
                "ajax": "{{ url('api/products') }}",
                "columns": [{
                        data: 'id'
                    },
                    {
                        data: 'stock'
                    },
                    {
                        data: 'imagen',
                        render: function(data, type, full, meta) {
                            return "<img src=\"/imgProductos/" + data + "\" height=\"50\"/>";
                        }
                    },
                    {
                        data: 'cod_barra'
                    },
                    {
                        data: 'nombre'
                    },
                    {
                        data: 'precio',

                        render: function(data, type) {
                            var number = DataTable.render
                                .number(',', '$')
                                .display(data);

                            if (type === 'display') {

                                return `<span >${number}</span>`;
                            }

                            return number;
                        }
                    },
                    {
                        data: 'descripcion'
                    },
                    {
                        data: 'proveedor'
                    },
                    {
                        data: 'categoria'
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
                        data: 'btnP'
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


            $('#iptcodbarra').keyup(function() {
                table.columns($(this).data('index')).search(this.value).draw();
            })
            $('#iptnombre').keyup(function() {
                table.columns($(this).data('index')).search(this.value).draw();
            })
            $('#iptproveedor').keyup(function() {
                table.columns($(this).data('index')).search(this.value).draw();
            })

            $('#iptstock').keyup(function() {
                table.columns($(this).data('index')).search(this.value).draw();
            })
            $('#iptcategoria').keyup(function() {
                table.columns($(this).data('index')).search(this.value).draw();
            })


        });
    </script>

@stop
