@extends('usuario_template')

@section('content')
<div class="col-md-12">
    <div class="box box-danger">
        <div class="box-header ui-sortable-handle">
            <h3 class="box-title">Mis casos</h3>              
        </div>
        <div class="box-body">
            @if(count($miscasos) > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Area</th>
                        <th>Motivo</th>
                        <th>Recomendaciones</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                @foreach($miscasos as $c)
                <tr>
                    <td>{{$c->fecha_caso}}</td>
                    <td>{{$c->area}}</td>
                    <td>{{$c->motivo}}</td>
                    <td>{{$c->recomendaciones}}</td>
                    <td>{{$c->estado}}</td>
                    <td><button title="Ver más Información" class="btn btn-primary" title="Información del Caso" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="infocaso('{{$c->documentousuario}}', '{{$c->nombreusaurio}} {{$c->apellidosusuario}}', '{{$c->id_caso}}', '{{$c->fecha_caso}}', '{{$c->motivo}}', '{{$c->recomendaciones}}', '{{URL::to("/")}}', '{{$c->genero}}', '{{$c->nombre}} {{$c->apellidos}}', '{{URL::to($c->foto)}}')"><i class="fa fa-eye"></i></button></td>
                </tr>
                @endforeach
            </table>
            @endif
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detalles del Caso</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">Mis Datos</div>

                    <!-- Table -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>DOCUMENTO</th>
                                <th>NOMBRE</th>
                                <th>GENERO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="documentousuario"></td>
                                <td id="nombreusuario"></td>
                                <td id="generousuario"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">Datos del Caso</div>

                    <!-- Table -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>FECHA</th>
                                <th>MOTIVO</th>
                                <th>RECOMENDACIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="id"></td>
                                <td id="fecha"></td>
                                <td id="motivo"></td>
                                <td id="recomendaciones"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">Estudiante Asignado</div>

                    <img src="" id="foto">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="nombre_est"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">Seguimiento del Caso</div>

                    <!-- Table -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Relación Suncita del Caso</th>
                                <th>Descripcion</th>
                                <th>Anexo</th>
                            </tr>
                        </thead>
                        <tbody id="seguimiento">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function infocaso(documentousuario, nombreusaurio, id_caso, fecha_caso, motivo, recomendaciones, url, genero, estudiante){
    $("#documentousuario").html(documentousuario);
    $("#nombreusuario").html(nombreusaurio);
    $("#id").html(id_caso);
    $("#fecha").html(fecha_caso);
    $("#motivo").html(motivo);
    $("#recomendaciones").html(recomendaciones);
    $("#generousuario").html(genero);
    $("#nombre_est").html(estudiante);
    $.ajax({
    url: url + "/casos/ver_seguimiento/" + id_caso,
            type: "get"
    }).done(function (res) {
    var j = JSON.parse(res);
    var result = "";
    $.each(j, function(i, item) {
    result += "<tr><td>" + item.created_at + "</td>";
    result += "<td>" + item.relacion + "</td>";
    result += "<td>" + item.descripcion + "</td>";
    if (item.anexo){
    result += "<td><a href='" + url + '/' + item.anexo + "' target='_blank'>Ver anexo</a></td></tr>";
    } else{
    result += "<td>--</td></tr>";
    }
    });
    $("#seguimiento").html(result);
    });
    }

</script>
@endsection