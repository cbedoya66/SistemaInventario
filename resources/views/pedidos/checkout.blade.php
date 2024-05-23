@extends('adminlte::page')

@section('title', 'Inventario')

@section('content_header')
    <h1 style="text-align: center">Pedidos por Cliente</h1>
@stop

@section('content')
    <form action="{{ route('store') }}" method="post">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <x-adminlte-input name="pedido_id" id="" type="text" placeholder="Nro. Pedido"
                            label="id_Pedido" label-class="text-lightblue" value=" {{ $pedidos->pedido_id + 1 }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-file text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col-6">
                        <x-adminlte-select2 label="Cédula Cliente" placeholder="Cédula Cliente" name="cliente_id"
                            id="cedula" label-class="text-lightblue" igroup-size="lg">
                            <x-slot name="prependSlot">
                                <div class="input-group-text ">
                                    <i class="fa fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                            <option></option>
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->cliente_id }}">
                                    {{ $cliente->cliente_id }}</option>
                            @endforeach
                        </x-adminlte-select2>

                    </div>
                </div>
            </div>
        </div>
        @if (Cart::count())
            <div class="col-6"><button type="submit" class="btn  btn-default text-success mx-1 shadow" title="Documento">
                    <i class="fas fa-trash"></i> Guardar Pedido
                </button>
            </div>
        @endif
    </form>
    &nbsp;
    <div class="container">
        <div class="row justify-content-center">
            <div class="card w-100">
                <div class="card-body">
                    @if (Cart::count())
                        <table class="table table-striped">
                            <thead>
                                <th>Id</th>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Importe</th>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $item)
                                    <tr class="aling-middle">
                                        <td>{{ $item->id }}</td>
                                        <td><img src="/imgProductos/{{ $item->options->imagen }} " width="50"></td>
                                        <td> ${{ $item->name }} </td>
                                        <td> {{ $item->qty }} </td>
                                        <td> ${{ number_format($item->price) }} </td>
                                        <td> ${{ number_format($item->qty * $item->price) }} </td>
                                        <td>
                                            <form action=" {{ route('removeItem') }} " method="post">
                                                @csrf
                                                <input type="hidden" name="rowId" value="{{ $item->rowId }}  ">
                                                <x-adminlte-button class="btn-flat w-50" type="submit" theme="danger"
                                                    icon="fas fa-trash" />
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('add') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="rowId" value="{{ $item->id }}  ">
                                                <input type="text" name="qty" value=" " style="width:30px">
                                                <x-adminlte-button class="btn-flat" type="submit" theme="success"
                                                    icon="fas fa-plus-circle" />
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class="fw-bolder">
                                    <td colspan="3"></td>
                                    <td class="text-end">Subtotal</td>
                                    <td class="text-end"> ${{ number_format(Cart::subtotal()) }} </td>
                                    <td></td>
                                </tr>
                                <tr class="fw-bolder">
                                    <td colspan="3"></td>
                                    <td class="text-end">Iva</td>
                                    <td class="text-end"> ${{ number_format(Cart::tax()) }} </td>
                                    <td></td>
                                </tr>
                                <tr class="fw-bolder">
                                    <td colspan="3"></td>
                                    <td class="text-end">Total</td>
                                    <td class="text-end"> ${{ number_format(Cart::total()) }} </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-6"><a href="{{ route('clear') }}"
                                    class="btn  btn-default text-danger mx-1 shadow" title="Documento">
                                    <i class="fas fa-trash"></i> Eliminar Pedido
                                </a>
                            </div>

                        </div>
                    @else
                        <div class="row">
                            <div class="col-12"><a href="{{ route('indexItem') }}"
                                    class="btn  btn-default text-success mx-1 shadow" title="Documento">
                                    <i class="fas fa-plus-circle"></i> Agregar un producto
                                </a>
                            </div>

                        </div>

                    @endif


                </div>
            </div>
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
