@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Configuración de Usuarios</h1>
@stop

@section('content')
    <div class="body">
        <div class="card-body">

        </div>

    </div>

    <p>Bienvenido al panel de Usuarios</p>
    <div class="card">
        <div class="card-body">
            @php
                $heads = ['Id', 'Avatar', 'Name', 'Email', ['label' => 'Actions', 'no-export' => true, 'width' => 10]];

                $btnEdit = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
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

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table3" :heads="$heads" head-theme="dark" :config="$config" theme="info" striped
                hoverable>

                @foreach ($users as $user)
                    <tr>

                        <td>{{ (int) $user->id }} </td>
                        <td><img style="width: 50px;height:50px" src="/storage/{{ $user->profile_photo_path }}" alt="">
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><a href="{{ route('users.edit', $user->id) }}  " type="submit"
                                class="btn btn-xs btn-default text-success mx-1 shadow bg-dark" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i> Editar
                            </a>

                            {{-- <form action="{{ route('tramite.destroy', $tramite->id) }}" method="POST"
                                class="formEliminar">
                                @csrf
                                @method('delete')
                                {!! $btnDelete !!}
                            </form> --}}
                        </td>
                    </tr>
                @endforeach

            </x-adminlte-datatable>
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
