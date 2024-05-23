@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Configuración del Sistema de Inventarios</h1>
@stop

@section('content')
    <div class="body">
        <div class="card-body">
            <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <x-adminlte-input name="nombre_sistema" label="Nombre del Sistema" placeholder="Nombre del Sistema"
                            label-class="text-lightblue">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-desktop text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        @error('nombre_sistema')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <h7>El archivo se debe llamar logo, con extención .png</h7>
                        <x-adminlte-input accept="image/*" name="logo" type="file" label="Logo"
                            label-class="text-lightblue" value="">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-file text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        @error('logo')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <img style="margin: auto;width:70px; heigth:70px" src="{{ asset('vendor/adminlte/dist/img/logo.png') }}"
                        alt="logo">
                </div>

                <div class="row">
                    <div class="col-12">
                        <h7>El archivo se debe llamar banner, con extención .png</h7>
                        <x-adminlte-input accept="image/*" name="banner" type="file" label="Banner"
                            label-class="text-lightblue" value="">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-file text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        @error('banner')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <img style="margin: auto;width:70px; heigth:70px"
                        src="{{ asset('vendor/adminlte/dist/img/banner.png') }}" alt="Banner">
                </div>

                <x-adminlte-button class="btn-flat" type="submit" label="Actualizar Sistema" theme="success"
                    icon="fas fa-lg fa-save" />

            </form>
        </div>

    </div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script></script>
@stop
