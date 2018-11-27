
@extends('jefe_area_template')

@section('content')
<div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-danger">
        <div class="box-header with-border">
            <a href="{{URL::to('/')}}"><img src="{{URL::to('img/logo.jpg')}}" style="width:5%;"></a>

            <h3 class="box-title">FORMATO HOJA DE VIDA DE ESTUDIANTES ACEPTADOS</h3>

        </div>
        <!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <th>FECHA REGISTRO:</th>
                    <td>{{$estudiante->created_at}}</td>
                    <th>TIPO DE DESPACHO AL QUE ASPIRA</th>
                    <td>{{$estudiante->tipo_despacho}}</td>
                </tr>
            </table>
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">DATOS BÁSICOS</h3>
                </div>
                <div class="box-body">
                    <center><img src="{{URL::to($estudiante->foto)}}" class="img-circle" alt="Icono"
                                 style="width: 20%;"></center>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>CÓDIGO ESTUDIANTE</th>
                                <th>APELLIDOS</th>
                                <th>NOMBRES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$estudiante->codigo}}</td>
                                <td>{{$estudiante->apellidos}}</td>
                                <td>{{$estudiante->nombre}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>CÓDIGO DEL PLAN</th>
                                <th>NOMBRE DEL PLAN</th>
                                <th>SEMESTRE</th>
                                <th>SEDE</th>
                                <th>JORNADA</th>
                                <th>PERIÓDO ACADÉMICO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$estudiante->codigo_plan}}</td>
                                <td>{{$estudiante->nombre_plan}}</td>
                                <td>{{$estudiante->semestre}}</td>
                                <td>{{$estudiante->sede}}</td>
                                <td>{{$estudiante->jornada}}</td>
                                <td>{{$estudiante->periodo_academico}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>GÉNERO</th>
                                <th>FECHA DE NACIMIENTO</th>
                                <th>EDAD</th>
                                <th>LUGAR DE NACIMIENTO</th>
                                <th>No. DOC. IDENTIDAD</th>
                                <th>EXPEDIDA EN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$estudiante->genero}}</td>
                                <td>{{$estudiante->fecha_nacimiento}}</td>
                                <td>{{$edad}}</td>
                                <td>{{$estudiante->lugar_nacimiento}}</td>
                                <td>{{$estudiante->documento}}</td>
                                <td>{{$estudiante->expedida_en}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>DIRECCIÓN ACTUAL RESIDENCIA</th>
                                <th>ESTRATO</th>
                                <th>BARRIO</th>
                                <th>DEPARTAMENTO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$estudiante->direccion_actual}}</td>
                                <td>{{$estudiante->estrato}}</td>
                                <td>{{$estudiante->barrio}}</td>
                                <td>{{$estudiante->departamento}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>TELÉFONO</th>
                                <td>{{$estudiante->telefono}}</td>
                                <th>CELULAR</th>
                                <td>{{$estudiante->celular}}</td>
                                <th>EMAIL</th>
                                <td>{{$estudiante->email}}</td>
                                <th>EMPLEADO PÚBLICO</th>
                                <td>{{$estudiante->funcionario}}</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div class="box-body">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">HORARIO DISPONIBLE</h3>

                        <p>Seleccione los espacios en los cuales será asignado el horario para asistir al
                            consultorio juridico.</p>

                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="encuenta">Al momento de asignar mi horario tener en
                                    cuenta:</label><br/>
                                {{$estudiante->encuenta}}
                            </div>
                        </div>
                        <br/>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>DÍA</th>
                                    <th>08-10</th>
                                    <th>10-12</th>
                                    <th>12-14</th>
                                    <th>14-16</th>
                                    <th>16-18</th>
                                    <th>18-20</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>LUNES</th>
                                    <td id="check_lunes810"></td>
                                    <td id="check_lunes1012"></td>
                                    <td id="check_lunes1214"></td>
                                    <td id="check_lunes1416"></td>
                                    <td id="check_lunes1618"></td>
                                    <td id="check_lunes1820"></td>
                                </tr>
                                <tr>
                                    <th>MARTES</th>
                                    <td id="check_martes810"></td>
                                    <td id="check_martes1012"></td>
                                    <td id="check_martes1214"></td>
                                    <td id="check_martes1416"></td>
                                    <td id="check_martes1618"></td>
                                    <td id="check_martes1820"></td>
                                </tr>
                                <tr>
                                    <th>MIERCOLES</th>
                                    <td id="check_miercoles810"></td>
                                    <td id="check_miercoles1012"></td>
                                    <td id="check_miercoles1214"></td>
                                    <td id="check_miercoles1416"></td>
                                    <td id="check_miercoles1618"></td>
                                    <td id="check_miercoles1820"></td>
                                </tr>
                                <tr>
                                    <th>JUEVES</th>
                                    <td id="check_jueves810"></td>
                                    <td id="check_jueves1012"></td>
                                    <td id="check_jueves1214"></td>
                                    <td id="check_jueves1416"></td>
                                    <td id="check_jueves1618"></td>
                                    <td id="check_jueves1820"></td>
                                </tr>
                                <tr>
                                    <th>VIERNES</th>
                                    <td id="check_viernes810"></td>
                                    <td id="check_viernes1012"></td>
                                    <td id="check_viernes1214"></td>
                                    <td id="check_viernes1416"></td>
                                    <td id="check_viernes1618"></td>
                                    <td id="check_viernes1820"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-body">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">ANEXOS</h3>
                            </div>
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{URL::to($estudiante->imagen_cedula)}}" target="_blank">Fotocopia
                                            de la Cédula de Ciudadanía o
                                            Documento
                                            de
                                            Identidad Vigente</a>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{URL::to($estudiante->imagen_carnet)}}" target="_blank">Fotocopia
                                            del carnet
                                            estudiantil
                                            universitario
                                            vigente</a>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{URL::to($estudiante->imagen_contraloria)}}" target="_blank">Certificado
                                            de antesedentes fiscales de
                                            la
                                            contraloria</a>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{URL::to($estudiante->imagen_procuraduria)}}" target="_blank">Certificado
                                            de antesedentes
                                            disciplinarios
                                            de
                                            la
                                            procuraduria</a>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{URL::to($estudiante->imagen_ponal)}}" target="_blank">Certificado
                                            de antesedentes penales de
                                            Ponal.</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Casos</h3>

                            <p>Casos asignados.</p>

                        </div>
                        <div class="box-body">
                            <div class="col-md-12">
                                @if(count($casos)>0)
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>FECHA</th>
                                            <th>Area</th>
                                            <th>Motivo</th>
                                            <th>Recomendaciones</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($casos as $c)
                                        <tr>
                                            <td>{{$c->created_at}}</td>
                                            <td>{{$c->area}}</td>
                                            <td>{{$c->motivo_consulta}}</td>
                                            <td>{{$c->recomendaciones}}</td>
                                            <td>{{$c->estado}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                No se han registrado observaciones.
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- /.box-body -->
        <div class="box-footer">
            <input type="hidden" id="url" value="{{URL::to('/')}}">
            <a href="{{URL::to('estudiantes/area')}}" class="btn btn-danger"><i class="fa fa-reply"></i> Volver</a>
            <button onclick="window.print();" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</button>

        </div>
        <!-- /.box-footer -->

    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
function ocultar() {
    $("#error").hide();
}

$(document).ready(function () {
    var json = eval(<?php echo $horario; ?>);
    var json2 = eval(<?php echo $horario2; ?>);
    $.each(json2, function (i, item) {
        $("#check_" + item.dia).html("CONSULTORIO");
        $("#check_" + item.dia).css("background-color", "green");
    });
    $.each(json, function (i, item) {
        $("#check_" + item.dia).html("CLASE");
        $("#check_" + item.dia).css("background-color", "red");
    });
});


    </script>
    @endsection()