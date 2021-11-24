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
                            Ciudad
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
                                    <!--<a href="#" onclick="confirm_user()" title="Confirmar email">
                                        Confirmar
                                    </a> --> 
                                @endif
                            </td>
                            <td>
                                {{ $user->phone ?? '' }}
                            </td>
                            <td>
                                {{ $user->city->name ?? '' }}
                            </td>
                            <td>
                                {{ $user->score ?? '0' }}
                            </td>
                            <td>
                                {{ $user->user_dreams->count() ?? '0' }}
                            </td>
                            <td>
                                {{ $user->formattedRegister() }}
                            </td>
                            <td>
                                <a href="user/details/{{ $user->id }}" title="Detalles">
                                    <i class="far fa-eye"></i>
                                </a>
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
    <style scoped>
        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #dc3545 !important;
            border-color: #dc3545 !important;
        }
    </style>
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
                    {
                        text: "Exportar a Excel",
                        extend: 'excelHtml5',
                        title: 'Participantes_Destapa_tu_sueno',
                        className: 'btn-danger'
                    }
                ]
            });

            

        });
        function confirm_user(){
            Swal.fire({
                title: '¿Está seguro de confirmar esta cuenta?',
                showCancelButton: true,
                showCancelButton: true,
                confirmButtonText: 'Si',
                cancelButtonText: `Cancelar`,
                confirmButtonClass: "btn-danger",
                type: 'question'
            }).then((result) => {
            if (result.value == true) {
                //Swal.fire('Saved!', '', 'success')
            } else if(result.dismiss == 'cancel') {
                //Swal.fire('Changes are not saved', '', 'info')
            }
            })
        }
    </script>
@stop
