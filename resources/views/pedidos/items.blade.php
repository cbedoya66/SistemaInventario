@extends('adminlte::page')

@section('title', 'Inventario')

@section('content_header')
    <h1 style="text-align: center">Pedidos por Cliente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action=" {{ route('filtroCategoria') }} " method="post">
                @csrf
                <div class="row">
                    <div class="col-7">
                        <x-adminlte-select2 name="categoria" label-class="text-lightblue" igroup-size="lg">
                            <x-slot name="prependSlot">
                                <div class="input-group-text ">
                                    <i class="fa fa-certificate text-lightblue"></i>
                                </div>
                            </x-slot>
                            <option>Selecciona la categoría</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->nombre }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>
                    <div class="col-5">
                        <x-adminlte-button class="btn-flat w-30" type="submit" label="" theme="success"
                            icon="fas fa-check" />
                    </div>
                </div>


            </form>

        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <x-adminlte-input name="" id="iptnombre" type="text" label="" placeholder=""
                            class="text-lg" value=" {{ Cart::count() }}  Producto(s) en el carrito  ">

                        </x-adminlte-input>
                    </div>
                    <div class="col-6">
                        <x-adminlte-input name="" id="iptnombre" type="text" label="" placeholder=""
                            class="text-lg" value="Total : {{ number_format(Cart::total(), 2) }}">

                        </x-adminlte-input>
                    </div>
                </div>

            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($productos as $producto)
                <div class="col-3">
                    <div class="card w-100">
                        <img style="width: 70px;height:70px; margin:auto" src="/imgProductos/{{ $producto->imagen }}"
                            alt="" class="card-img-top">
                        <div class="card-body text-center">
                            <h5> {{ $producto->nombre }} </h5>
                            <P>COP {{ $producto->precio }} </P>
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('add') }}  " method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $producto->id }}  ">
                                <x-adminlte-button class="btn-flat w-100" type="submit" label="Agregar al carrito"
                                    theme="success" icon="fas fa-cart-plus" />
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
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
                    text: mensaje,
                    icon: "success"
                });
            })
        </script>
    @endif


@stop
