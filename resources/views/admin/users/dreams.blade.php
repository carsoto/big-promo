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
        <h1>Sueños de {{ $data['user']->fullName() }}</h1>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="videos-table" class="table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>
                            Subido
                        </th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data['dreams'] AS $key => $value)
                        <tr data-entry-id="{{ $value->user->id }}">
                            <td>
                                {{ Carbon\Carbon::parse($value->created_at)->format('d-m-Y') }}
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
    </script>
@stop

