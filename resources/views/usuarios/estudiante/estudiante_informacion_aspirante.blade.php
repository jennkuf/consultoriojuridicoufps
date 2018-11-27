@extends('director_template')

@section('content')
<div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-danger">
        <div class="box-header with-border">
            <a href="{{URL::to('/')}}"><img src="{{URL::to('img/logo.jpg')}}" style="width:5%;"></a>

            <h3 class="box-title">FORMATO HOJA DE VIDA DE ESTUDIANTES</h3>

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
                        {!! Form::open(array('url' => 'estudiantes/aceptar_matricula', 'method' => 'post', 'id' => "formulario")) !!}
                        <input type="hidden" value="{{$estudiante->id}}" name="id">
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
                                    <td id="check_lunes810"><input type="checkbox" value="lunes810" id="lunes810"
                                                                   name="horario[]"> DISPONIBLE
                                    </td>
                                    <td id="check_lunes1012"><input type="checkbox" value="lunes1012" id="lunes1012"
                                                                    name="horario[]"
                                                                    > DISPONIBLE
                                    </td>
                                    <td id="check_lunes1214"><input type="checkbox" value="lunes1214" id="lunes1214"
                                                                    name="horario[]"
                                                                    > DISPONIBLE
                                    </td>
                                    <td id="check_lunes1416"><input type="checkbox" value="lunes1416" id="lunes1416"
                                                                    name="horario[]"
                                                                    > DISPONIBLE
                                    </td>
                                    <td id="check_lunes1618"><input type="checkbox" value="lunes1618" id="lunes1618"
                                                                    name="horario[]"
                                                                    > DISPONIBLE
                                    </td>
                                    <td id="check_lunes1820"><input type="checkbox" value="lunes1820" id="lunes1820"
                                                                    name="horario[]"
                                                                    > DISPONIBLE
                                    </td>
                                </tr>
                                <tr>
                                    <th>MARTES</th>
                                    <td id="check_martes810"><input type="checkbox" value="martes810" id="martes810"
                                                                    name="horario[]"
                                                                    > DISPONIBLE
                                    </td>
                                    <td id="check_martes1012"><input type="checkbox" value="martes1012"
                                                                     id="martes1012"
                                                                     name="horario[]"
                                                                     > DISPONIBLE
                                    </td>
                                    <td id="check_martes1214"><input type="checkbox" value="martes1214"
                                                                     id="martes1214"
                                                                     name="horario[]"
                                                                     > DISPONIBLE
                                    </td>
                                    <td id="check_martes1416"><input type="checkbox" value="martes1416"
                                                                     id="martes1416"
                                                                     name="horario[]"
                                                                     > DISPONIBLE
                                    </td>
                                    <td id="check_martes1618"><input type="checkbox" value="martes1618"
                                                                     id="martes1618"
                                                                     name="horario[]"
                                                                     > DISPONIBLE
                                    </td>
                                    <td id="check_martes1820"><input type="checkbox" value="martes1820"
                                                                     id="martes1820"
                                                                     name="horario[]"
                                                                     > DISPONIBLE
                                    </td>
                                </tr>
                                <tr>
                                    <th>MIERCOLES</th>
                                    <td id="check_miercoles810"><input type="checkbox" value="miercoles810"
                                                                       id="miercoles810" name="horario[]"
                                                                       > DISPONIBLE
                                    </td>
                                    <td id="check_miercoles1012"><input type="checkbox" value="miercoles1012"
                                                                        id="miercoles1012" name="horario[]"
                                                                        > DISPONIBLE
                                    </td>
                                    <td id="check_miercoles1214"><input type="checkbox" value="miercoles1214"
                                                                        id="miercoles1214" name="horario[]"
                                                                        > DISPONIBLE
                                    </td>
                                    <td id="check_miercoles1416"><input type="checkbox" value="miercoles1416"
                                                                        id="miercoles1416" name="horario[]"
                                                                        > DISPONIBLE
                                    </td>
                                    <td id="check_miercoles1618"><input type="checkbox" value="miercoles1618"
                                                                        id="miercoles1618" name="horario[]"
                                                                        > DISPONIBLE
                                    </td>
                                    <td id="check_miercoles1820"><input type="checkbox" value="miercoles1820"
                                                                        id="miercoles1820" name="horario[]"
                                                                        > DISPONIBLE
                                    </td>
                                </tr>
                                <tr>
                                    <th>JUEVES</th>
                                    <td id="check_jueves810"><input type="checkbox" value="jueves810" id="jueves810"
                                                                    name="horario[]"> DISPONIBLE
                                    </td>
                                    <td id="check_jueves1012"><input type="checkbox" value="jueves1012"
                                                                     id="jueves1012"
                                                                     name="horario[]"> DISPONIBLE
                                    </td>
                                    <td id="check_jueves1214"><input type="checkbox" value="jueves1214"
                                                                     id="jueves1214"
                                                                     name="horario[]"> DISPONIBLE
                                    </td>
                                    <td id="check_jueves1416"><input type="checkbox" value="jueves1416"
                                                                     id="jueves1416"
                                                                     name="horario[]"> DISPONIBLE
                                    </td>
                                    <td id="check_jueves1618"><input type="checkbox" value="jueves1618"
                                                                     id="jueves1618"
                                                                     name="horario[]"> DISPONIBLE
                                    </td>
                                    <td id="check_jueves1820"><input type="checkbox" value="jueves1820"
                                                                     id="jueves1820"
                                                                     name="horario[]"> DISPONIBLE
                                    </td>
                                </tr>
                                <tr>
                                    <th>VIERNES</th>
                                    <td id="check_viernes810"><input type="checkbox" value="viernes810"
                                                                     id="viernes810" name="horario[]"> DISPONIBLE
                                    </td>
                                    <td id="check_viernes1012"><input type="checkbox" value="viernes1012"
                                                                      id="viernes1012" name="horario[]"> DISPONIBLE
                                    </td>
                                    <td id="check_viernes1214"><input type="checkbox" value="viernes1214"
                                                                      id="viernes1214" name="horario[]"> DISPONIBLE
                                    </td>
                                    <td id="check_viernes1416"><input type="checkbox" value="viernes1416"
                                                                      id="viernes1416" name="horario[]"> DISPONIBLE
                                    </td>
                                    <td id="check_viernes1618"><input type="checkbox" value="viernes1618"
                                                                      id="viernes1618" name="horario[]"> DISPONIBLE
                                    </td>
                                    <td id="check_viernes1820"><input type="checkbox" value="viernes1820"
                                                                      id="viernes1820" name="horario[]"> DISPONIBLE
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {!! Form::close() !!}
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
                            <h3 class="box-title">Observaciones</h3>

                            <p>Observaciones durante el desarrollo del consultorio jurídico.</p>

                        </div>
                        <div class="box-body">
                            <div class="col-md-12">
                                @if(count($observaciones)>0)
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>FECHA</th>
                                            <th>OBSERVACION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($observaciones as $o)
                                        <tr>
                                            <td>{{$o->created_at}}</td>
                                            <td>{{$o->observacion}}</td>
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
            <a href="{{URL::to('/')}}" class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</a>
            <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#aceptar">
                <i class="fa fa-check"></i>
                Aceptar
            </button>
            <button type="button" class="btn btn-warning pull-right" data-toggle="modal"
                    data-target="#rechazar"><i class="fa fa-ban"></i>
                Rechazar
            </button>
            <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#posponer"><i
                    class="fa fa-hand-stop-o"></i>
                Posponer
            </button>
        </div>
        <!-- /.box-footer -->

    </div>
    <!-- /.box -->
    <!-- /.box -->
</div>


<!-- Modal -->
<div class="modal fade" id="aceptar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-question-circle"></i> Confirmación
                </h4>
            </div>

            <div class="modal-body">
                ¿Está seguro que desea aceptar el estudiante dentro del Consultorio Jurídico?. Tenga en cuenta
                que este proceso le asignará un usuairo (código) y una contraseña (documento) al estudiante para
                iniciar en el sistema.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-success" onclick="aceptar()">Si</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="rechazar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-question-circle"></i> Confirmación
                </h4>
            </div>
            {!! Form::open(array('url' => 'estudiantes/rechazar_matricula', 'method' => 'post')) !!}
            <div class="modal-body">
                <input type="hidden" value="{{$estudiante->id}}" name="id">
                ¿Está seguro que desea rechazar el estudiante dentro del Consultorio Jurídico?.
                <br/>
                <label>Observación:</label>
                <textarea class="form-control" name="obs" required></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-success">Si</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="posponer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-question-circle"></i> Confirmación
                </h4>
            </div>
            {!! Form::open(array('url' => 'estudiantes/posponer_matricula', 'method' => 'post')) !!}
            <div class="modal-body">
                <input type="hidden" value="{{$estudiante->id}}" name="id">
                ¿Está seguro que desea posponer el proceso de selección del estudiante dentro del Consultorio
                Jurídico?.
                <br/>
                <label>Observación:</label>
                <textarea class="form-control" name="obs" required></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-success">Si</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

</div>
<!-- /.content-wrapper -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    function ocultar() {
        $("#error").hide();
    }
    $(document).ready(function () {
        var json = eval(<?php echo $horario; ?>);
        for (i = 0; i <= json.length; i++) {
            $("#check_" + json[i].dia).html("CLASE");
            $("#check_" + json[i].dia).css("background-color", "red");
        }
    });

    function aceptar() {
        $("#formulario").submit();
    }
</script>

@endsection()