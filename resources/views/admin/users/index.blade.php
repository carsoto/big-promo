@extends('adminlte::page')

@section('title', 'Participantes')

@section('content_header')
    <!--<h1>Listado de usuarios</h1>-->
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Listado de participantes</h1>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="users-table" class="table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>
                            Nombre Completo
                        </th>
                        <th>
                           Correo
                        </th>
                        <th>
                            Confirmado
                         </th>
                        <th>
                            Teléfono
                        </th>
                        <th>
                            Puntaje
                        </th>
                        <th>
                            Sueños
                        </th>
                        <th>
                            F. de registro
                        </th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                        <tr data-entry-id="{{ $user->id }}">
                            <td>
                                {{ $user->fullName() }}
                            </td>
                            <td>
                                {{ $user->email ?? '' }}
                            </td>
                            <td class="text-center">
                                @if($user->confirmed)         
                                    <i class="fas fa-check" style="color: green;"></i>
                                @else
                                    <i class="fas fa-times" style="color: red;"></i>
                                @endif
                            </td>
                            <td>
                                {{ $user->phone ?? '' }}
                            </td>
                            <td>
                                {{ '' }}
                            </td>
                            <td>
                                {{ '' }}
                            </td>
                            <td>
                                {{ $user->formattedRegister() }}
                            </td>
                            <td>
                                <a href="#" title="Detalles">
                                    <i class="far fa-eye"></i>
                                </a>
                                |
                                <a href="#" title="Enviar correo">
                                    <i class="fas fa-paper-plane"></i>
                                </a>
                                <ion-icon name="color-wand-outline"></ion-icon>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
        $(function () {
            $('#users-table').DataTable( {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
@stop
