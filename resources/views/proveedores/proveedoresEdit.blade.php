@extends('adminlte::page')

@section('title', 'IntranetPersoneria')

@section('content_header')
    <h1 style="text-align: center">Editar Proveedores</h1>
@stop

@section('content')


    <p>Editar Proveeedor</p>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('proveedores.update', $proveedores) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6"><x-adminlte-input name="nit_proveedor" id="nit_proveedor" type="text" label="Nit"
                            placeholder="Nit" label-class="text-lightblue" value="{{ $proveedores->nit_proveedor }}">
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
                            label="Nombre Proveedor" placeholder="Nombre Proveedor" label-class="text-lightblue"
                            value="{{ $proveedores->nombre }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-file text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>

                    <div class="col-6"><x-adminlte-input name="direccion" id="direccion" type="text"
                            label="Dirección Proveeedor" placeholder="Dirección Proveeedor" label-class="text-lightblue"
                            value="{{ $proveedores->direccion }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-file text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3"><x-adminlte-input name="telefono" id="telefono" type="text"
                            label="Teléfono proveedor" placeholder="Teléfono proveedor" label-class="text-lightblue"
                            value="{{ $proveedores->telefono }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-file text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-6"><x-adminlte-input name="contacto" id="contacto" type="text" label="Contacto"
                            placeholder="Contacto" label-class="text-lightblue" value="{{ $proveedores->contacto }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-file text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-6">
                        <x-adminlte-select2 name="estado" label="Estado" label-class="text-lightblue" igroup-size="lg">
                            <x-slot name="prependSlot">
                                <div class="input-group-text ">
                                    <i class="fa fa-graduation-cap text-lightblue"></i>
                                </div>
                            </x-slot>
                            <option value="{{ $proveedores->estado }}">{{ $proveedores->estado }}</option>
                            <option>Selecciona el Estado</option>
                            <option>Activo</option>
                            <option>Inactivo</option>

                        </x-adminlte-select2>
                    </div>
                </div>

                <x-adminlte-button class="btn-flat" type="submit" label="Guardar Proveedor" theme="success"
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



@stop
