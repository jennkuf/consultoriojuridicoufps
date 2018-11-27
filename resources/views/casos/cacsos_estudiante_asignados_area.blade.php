<?php
/**
 * Created by PhpStorm.
 * User: ing.Diegox
 * Date: 2/06/2016
 * Time: 8:42 PM
 */
?>
@extends("jefe_area_template")
@section('content')
<div class="col-md-12">
    <!-- USERS LIST -->
    <div class="box box-default">
        <div class="box-header with-border">
            <a href="{{URL::to('estudiantes/area')}}"><i class="fa fa-reply"></i> Volver</a><br/>
            <h3 class="box-title">Listado de casos asignados al estudiante: <b>{{$estudiante->apelldios}} {{$estudiante->nombre}}</b></h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            @if(count($casos) > 0)
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>FECHA</th>
                            <th>MOTIVO</th>
                            <th>RECOMENDACIONES</th>
                            <th>OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($casos as $c)
                        <tr>
                            <td>{{$c->id_caso}}</td>
                            <td>{{$c->fecha_caso}}</td>
                            <td>{{$c->motivo}}</td>
                            <td>{{$c->recomendaciones}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" title="Información del Caso"
                                        data-toggle="modal" data-target=".bs-example-modal-lg"
                                        onclick="infocaso('{{$c->documentousuario}}', '{{$c->nombreusaurio}} {{$c->apellidosusuario}}', '{{$c->id_caso}}', '{{$c->fecha_caso}}', '{{$c->motivo}}', '{{$c->recomendaciones}}', '{{URL::to("/")}}')"><i
                                        class="fa fa-search"></i>Seguimiento</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            No hay..
            @endif

            <!-- /.users-list -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">

        </div>
        <!-- /.box-footer -->
    </div>
    <!--/.box -->

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
                    <div class="panel-heading">SOLICITANTE</div>

                    <!-- Table -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>DOCUMENTO</th>
                                <th>NOMBRE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="documentousuario"></td>
                                <td id="nombreusuario"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">CASO</div>

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
                    <div class="panel-heading">Seguimiento</div>

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
    function infocaso(documentousuario, nombreusuario, id, fecha, motivo, recomendaciones, url){
    $("#nombreusuario").html(nombreusuario);
    $("#documentousuario").html(documentousuario);
    $("#id").html(id);
    $("#fecha").html(fecha);
    $("#motivo").html(motivo);
    $("#recomendaciones").html(recomendaciones);
    $.ajax({
    url: url + "/casos/ver_seguimiento/" + id,
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
