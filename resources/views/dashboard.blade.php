@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sistema Web de Inventarios</h1>
@stop

@section('content')
    <div class="body">
        <div class="card-body">
            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fa fa-file"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Ordenes de compra</span>
                                    <span class="info-box-number">
                                        10
                                        <small>%</small>
                                    </span>
                                </div>

                            </div>

                        </div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Compras recibidas</span>
                                    <span class="info-box-number">41,410</span>
                                </div>

                            </div>

                        </div>

                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fa fa-reply"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Devoluciones</span>
                                    <span class="info-box-number">760</span>
                                </div>

                            </div>

                        </div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-credit-card"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Ventas</span>
                                    <span class="info-box-number">2,000</span>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fa fa-truck"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Proveedores</span>
                                    <span class="info-box-number">
                                        10
                                        <small>%</small>
                                    </span>
                                </div>

                            </div>

                        </div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i
                                        class="fa fa-shopping-basket "></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Productos</span>
                                    <span class="info-box-number">41,410</span>
                                </div>

                            </div>

                        </div>

                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fa fa-user-plus"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Usuarios</span>
                                    <span class="info-box-number">{{ $users }}</span>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </section>

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
