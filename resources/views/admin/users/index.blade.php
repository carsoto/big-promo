@extends('adminlte::page')

@section('title', 'Participantes')

@section('content_header')
    <!--<h1>Listado de usuarios</h1>-->
@stop

@section('content')
<div class="card">
    <div id="modal-loading" data-backdrop="static" data-keyboard="false" class="modal modal-loading">
        <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="spinner-border text-yellow" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
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
                                    <!-- <i class="fas fa-times" style="color: red;"></i> -->
                                    <span id="confirmed_label_{{ $user->id }}"><a href="#" onclick="confirm_user({{ $user->id }})" title="Confirmar email">
                                        Confirmar
                                    </a></span>
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
    <style scoped>
        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #dc3545 !important;
            border-color: #dc3545 !important;
        }
        .modal-loading {
            background-color: #ee000cb6!important;
        }
        .spinner-border{
            width: 5rem;
            height: 5rem;
            border-width: 6px;
        }
        .modal-content {
            background: none;
            border: none;
            justify-content: center;
            align-items: center;
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
                "pageLength": 50,
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
        function confirm_user(user_id){
            console.log(user_id);
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
                $("#modal-loading").modal("show");
                $.ajax({
                    url : '/api/users/confirm',
                    data : { user_id : user_id },
                    type : 'POST',
                    dataType : 'json',
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success : function(response) {
                        if(response.success) {
                            Swal.fire('Usuario confirmado exitosamente!', '', 'success');  
                            $("#confirmed_label_"+user_id).html('<i class="fas fa-check" style="color: green;"></i>');
                        }else {
                            Swal.fire('Ocurrió un error', '', 'error') 
                        }
                        $("#modal-loading").modal("hide");
                    },
                    error : function(json , xhr, status) {
                        console.log('error');
                    },
                    complete : function(json , xhr, status) {

                    }
                });
            } else if(result.dismiss == 'cancel') {
                //Swal.fire('Not confirmed', '', 'info')
            }
            })
        }
    </script>
@stop
