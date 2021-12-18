@extends('adminlte::page')

@section('title', 'Participantes')

@section('content_header')
    <!--<h1>Listado de usuarios</h1>-->
@stop

@section('content')
<div class="card">
    <div id="modal-video" class="modal fade" data-backdrop="static" data-keyboard="false">
        <a href="#" onclick="closeModal()" class="close-modal-btn p-3 float-right text-white"><i class="far fa-3x fa-times-circle"></i></a>
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div id="modal-body-video" class="modal-content bg-dark"></div>
        </div>
    </div>
    <div class="card-header">
        <h1>Sueños {{ Carbon\Carbon::parse($data['date'])->format('d-m-Y') }}</h1>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="videos-table" class="table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>
                            Nombre Completo
                        </th>
                        <th>
                           Correo
                        </th>
                        <th>
                            Teléfono
                        </th>
                        <th>
                            Ciudad
                        </th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data['dreams'] as $key => $value)
                        <tr data-entry-id="{{ $value->user->id }}">
                            <td>
                                {{ $value->user->fullName() }}
                            </td>
                            <td>
                                {{ $value->user->email ?? '' }}
                            </td>
                            
                            <td>
                                {{ $value->user->phone ?? '' }}
                            </td>
                            <td>
                                {{ $value->user->city->name ?? '' }}
                            </td>
                            <td>
                                <a href="#" onclick="playVideo('{{ asset($value->dream) }}')" title="Reproducir">
                                    <i class="fas fa-video"></i>
                                </a> | 
                                <a href="/api/download-dream-video/{{ $value->id }}" title="Descargar"><i class="fas fa-download"></i></a>
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
            $('#videos-table').DataTable( {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                "pageLength": 50,
                buttons: []
            });
        });

        function closeModal() {
            $("#modal-body-video").html('<video width="100%" height="450" controls><source src="" type="video/mp4"></video>');
            $('#modal-video').modal('hide');
        }

        function playVideo(video_url) {
            $("#modal-body-video").html('<video width="100%" height="450" controls><source src="'+ video_url +'" type="video/mp4"></video>');
            $("#modal-video").modal('show');
        }

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
