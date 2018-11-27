<?php
/**
 * Created by PhpStorm.
 * User: ing.Diegox
 * Date: 2/06/2016
 * Time: 9:18 AM
 */
?>
@extends("estudiante_template")
@section("content")
<div class="col-md-12">
    <!-- USERS LIST -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Listado de Casos</h3>
            <div class="box-tools pull-right">
                <a href="{{URL::to('casos/recibir_nuevo')}}" class="btn btn-box-tool"><i class="fa  fa-file-text-o"></i> Recibir Caso</a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <div class="col-md-12">
                @if(count($casos) > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Area</th>
                            <th>Estudiante Recibe</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($casos as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td>{{$c->area}}</td>
                            <td>{{$c->codigo}}</td>
                            <td>{{$c->estado}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" title="Información del Caso"
                                        data-toggle="modal" data-target=".bs-example-modal-lg"
                                        onclick="infocaso('{{$c->documentousuario}}', '{{$c->nombreusaurio}} {{$c->apellidosusuario}}', '{{$c->id}}', '{{$c->fecha}}', '{{$c->motivo_consulta}}', '{{$c->recomendaciones}}', '{{URL::to("/")}}')"><i
                                        class="fa fa-search"></i></button>
                                <button data-toggle="modal" data-target="#myModal" class="btn btn-info"
                                        title="Seguimiento al caso" data-tooltip="Seguimiento al caso"><i
                                        class="fa fa-mortar-board" onclick="caso('{{$c->id}}')"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                No hay..
                @endif
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">

        </div>
        <!-- /.box-footer -->
    </div>
    <!--/.box -->
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Seguimiento al Caso</h4>
            </div>
            {!! Form::open(array('url' => 'casos/seguimiento', 'class' => 'form-horizontal', 'method' => 'post', 'files' => 'yes')) !!}
            <input type="hidden" id="id_caso" name="id_caso" value="">

            <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nombre">Relacion Suncita del Caso</label>
                        <textarea name="relacion" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nombre">Descripcion</label>
                        <textarea name="descripcion" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="anexo" id="anexo" onclick="agregarAnexo()"> Agregar Anexo
                    </div>
                </div>
                <div class="col-md-12" style="display: none;" id="campo_anexo">
                    <div class="form-group">
                        <label for="adjuntocaso">Anexo al caso:</label>
                        <input type="file" name="adjuntocaso" id="adjuntocaso" class="form-control">                      
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"> </i> NO
                </button>
                <button type="submit" class="btn btn-success"><i class="fa fa-check"> </i> SI</button>
            </div>
            {!! Form::close() !!}
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
    function caso(id) {
    $("#id_caso").val(id);
    }

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

    function agregarAnexo(){
    if ($('#anexo').prop('checked')) {
    $("#campo_anexo").removeAttr('style');
    $("#adjuntocaso").attr('required', 'true');
    } else{
    $("#campo_anexo").css('display', 'none');
    $("#adjuntocaso").removeAttr('required');
    }
    }
</script>
@endsection
