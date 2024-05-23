@extends('adminlte::page')

@section('title', 'IntranetPersoneria')

@section('content_header')
    <h1 style="text-align: center">Editar Productos</h1>
@stop

@section('content')


    <p>Editar Productos</p>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('products.update', $products) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-4"><x-adminlte-input name="cod_barra" id="cod_barra" type="text"
                            label="Codigo de Barras" placeholder="Codigo de Barras" label-class="text-lightblue"
                            value="{{ $products->cod_barra }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-file text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6"><x-adminlte-input name="nombre" id="nombre" type="text"
                            label="Nombre Producto" placeholder="Nombre Producto" label-class="text-lightblue"
                            value="{{ $products->nombre }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-file text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-3"><x-adminlte-input name="precio" id="precio" type="text" label="Precio"
                            placeholder="Precio" label-class="text-lightblue" value="{{ $products->precio }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-file text-lightblue"></i>
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
                            <option value="{{ $products->estado }}">{{ $products->estado }}</option>
                            <option>Activo</option>
                            <option>Inactivo</option>
                        </x-adminlte-select2>
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
                            {{ $products->descripcion }}
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
                            <option value="{{ $products->proveedor }}">{{ $products->proveedor }}</option>
                            <option>Selecciona el Proveedor</option>
                            @foreach ($proveedores as $proveedor)
                                <option value="{{ $proveedor->nombre }}">{{ $proveedor->nombre }}</option>
                            @endforeach

                        </x-adminlte-select2>

                    </div>

                    <div class="col-3"><x-adminlte-input name="placa" id="placa" type="text"
                            label="Placa Inventario" placeholder="Placa Inventario" label-class="text-lightblue"
                            value="{{ $products->placa }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-file text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-2"><x-adminlte-input name="stock" id="stock" type="number" min="1"
                            max="10000" label="Stock" placeholder="Stock" label-class="text-lightblue"
                            value="{{ $products->stock }}">
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
                        <h7>Cargar la imagen del producto con extencón .png</h7>
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
                            <img style="margin: auto;width:100px; heigth:100px" id="imgPreview"
                                src="/imgProductos/{{ $products->imagen }}" alt="">
                        </div>
                    </div>
                </div>
                <x-adminlte-button class="btn-flat" type="submit" label="Guardar Producto" theme="success"
                    icon="fas fa-lg fa-save" />
            </form>
        </div>
    </div>

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


@stop
