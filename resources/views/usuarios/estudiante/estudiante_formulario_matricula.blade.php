<!DOCTYPE  html>
<!--cargamos nuestro modulo en la etiqueta html con ng-app-->
<html lang="es" ng-app="app">
<head>
    <link rel="shortcut icon" href="{{URL::to('img/icon.ico')}}"/>
    <meta charset="UTF-8"/>
    <title>AsesoríasJurídicas</title>
    {!! Html::style('AdminLTE-2.3.0/dist/css/AdminLTE.css') !!}
    {!! Html::style('AdminLTE-2.3.0/bootstrap/css/bootstrap.css') !!}
    {!! Html::script('AdminLTE-2.3.0/dist/js/jquery-1.11.3.min.js') !!}
    {!! Html::script('AdminLTE-2.3.0/plugins/jQuery/jQuery-2.1.4.min.js') !!}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    {!! Html::style("AdminLTE-2.3.0/plugins/jvectormap/jquery-jvectormap-1.2.2.css") !!}
            <!-- Theme style -->
    {!! Html::style("AdminLTE-2.3.0/dist/css/AdminLTE.min.css") !!}
            <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
    {!! Html::style("AdminLTE-2.3.0/dist/css/skins/_all-skins.min.css") !!}
</head>
<body class="">
<div class="col-md-3">
    @if (!empty(session('error')))
        <div class="alert alert-danger alert-dismissable" id="error">
            <i class="fa fa-ban"></i>
            <button type="button" onclick="ocultar()" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <b>Alert!</b> {!! session('error') !!}
        </div>
    @endif
    @if (!empty(session('mensaje')))
        <div class="alert alert-success alert-dismissable" id="error">
            <i class="fa fa-check"></i>
            <button type="button" onclick="ocultar()" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <b>Alert!</b> {!! session('mensaje') !!}
        </div>
    @endif
</div>
<div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-danger">
        <div class="box-header with-border">
            <a href="{{URL::to('/')}}"><img src="{{URL::to('img/logo.jpg')}}" style="width:5%;"></a>

            <h3 class="box-title">FORMATO HOJA DE VIDA DE ESTUDIANTES</h3>

        </div>
        <!-- /.box-header -->
        <!-- form start -->

        {!! Form::open(array('url' => 'matricula/crear', 'method' => 'post', 'enctype' => "multipart/form-data")) !!}
        <div class="box-body">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">DATOS BÁSICOS</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12" id="codigo_input">
                        <div class="form-group" id="codigo_div">
                            <label class="control-label" for="inputSuccess" id="label_codigo">Código</label>
                            <input type="text" class="form-control" id="codigo" placeholder="Código" name="codigo"
                                   required>
                            <span class="help-block" id="info_codigo"></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/jpeg" required
                                   disabled>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nombre">Nombres</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombres" required="true"
                                   name="nombre" disabled>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" placeholder="Apellidos"
                                   required="true" name="apellidos" disabled>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tipo_despacho">Tipo de Despacho:</label>
                            <select class="form-control" name="tipo_despacho" id="tipo_despacho" required disabled>
                                <option value="CIVIL">CIVIL</option>
                                <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                                <option value="LABORAL">LABORAL</option>
                                <option value="PENAL">PENAL</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="semestre">Semestre</label>
                            <select class="form-control" id="semestre" placeholder="Semestre" required="true"
                                    name="semestre" disabled>
                                <option value="SÉPTIMO">SÉPTIMO</option>
                                <option value="OCTAVO">OCTAVO</option>
                                <option value="NOVENO">NOVENO</option>
                                <option value="DÉCIMO">DÉCIMO</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="jornada">Jornada</label>
                            <select class="form-control" id="jornada" placeholder="Jornada" required="true" name="jornada" disabled>
                                <option value="DIURNA">DIURNA</option>
                                <option value="NOCTURNA">NOCTURNA</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="periodo_academico">Periodo Academico</label>
                            <select  class="form-control" id="periodo_academico" placeholder="Periodo Academico" required="true" name="periodo_academico" required disabled>
                                <option value="I">I</option>
                                <option value="II">II</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="genero">Género</label>
                            <select class="form-control" id="genero" name="genero" required disabled>
                                <option value="MASCULINO">MASCULINO</option>
                                <option value="FEMENINO">FEMENINO</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento"
                                   placeholder="Fecha de Nacimiento"
                                   required="true" name="fecha_nacimiento" max="1999-12-31" required disabled>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="lugar_nacimiento">Lugar de Nacimiento</label>
                            <input type="text" class="form-control" id="lugar_nacimiento"
                                   placeholder="Lugar de Nacimiento"
                                   required="true" name="lugar_nacimiento" required disabled>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="documento">Número de Documento</label>
                            <input type="number" class="form-control" id="documento"
                                   placeholder="Número de Documento"
                                   required="true" name="documento" required disabled>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="documento">Expedida en</label>
                            <input type="text" class="form-control" id="expedida_en"
                                   placeholder="Expedida en"
                                   required="true" name="expedida_en" required disabled>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="direccion_actual">Direccion Actual</label>
                            <input type="text" class="form-control" id="direccion_actual" placeholder="Direccion Actual"
                                   required="true" name="direccion_actual" required disabled>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="estrato">Estrato</label>
                            <select class="form-control" id="estrato" placeholder="Estrato" required="true" name="estrato" disabled>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="barrio">Barrio</label>
                            <input type="text" class="form-control" id="barrio" placeholder="Barrio"
                                   required="true" name="barrio" required disabled>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="text" class="form-control" id="telefono" placeholder="Telefono"
                                   required="true" name="telefono" required disabled>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="celular">Celular</label>
                            <input type="text" class="form-control" id="celular" placeholder="Celular"
                                   required="true" name="celular" required disabled>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email"
                                   required="true" name="email" required disabled>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="funcionario">Actualmente es Funcionario Público</label>
                            <select class="form-control" id="funcionario" name="funcionario" required disabled>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">HORARIO NO DISPONIBLE</h3>

                        <p>Seleccione los espacios en los cuales tiene clase.</p>
                    </div>
                    <div class="box-body">
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
                                <td><input type="checkbox" value="lunes810" id="lunes810" name="horario[]" disabled>
                                </td>
                                <td><input type="checkbox" value="lunes1012" id="lunes1012" name="horario[]" disabled>
                                </td>
                                <td><input type="checkbox" value="lunes1214" id="lunes1214" name="horario[]" disabled>
                                </td>
                                <td><input type="checkbox" value="lunes1416" id="lunes1416" name="horario[]" disabled>
                                </td>
                                <td><input type="checkbox" value="lunes1618" id="lunes1618" name="horario[]" disabled>
                                </td>
                                <td><input type="checkbox" value="lunes1820" id="lunes1820" name="horario[]" disabled>
                                </td>
                            </tr>
                            <tr>
                                <th>MARTES</th>
                                <td><input type="checkbox" value="martes810" id="martes810" name="horario[]" disabled>
                                </td>
                                <td><input type="checkbox" value="martes1012" id="martes1012" name="horario[]" disabled>
                                </td>
                                <td><input type="checkbox" value="martes1214" id="martes1214" name="horario[]" disabled>
                                </td>
                                <td><input type="checkbox" value="martes1416" id="martes1416" name="horario[]" disabled>
                                </td>
                                <td><input type="checkbox" value="martes1618" id="martes1618" name="horario[]" disabled>
                                </td>
                                <td><input type="checkbox" value="martes1820" id="martes1820" name="horario[]" disabled>
                                </td>
                            </tr>
                            <tr>
                                <th>MIERCOLES</th>
                                <td><input type="checkbox" value="miercoles810" id="miercoles810" name="horario[]"
                                           disabled></td>
                                <td><input type="checkbox" value="miercoles1012" id="miercoles1012" name="horario[]"
                                           disabled></td>
                                <td><input type="checkbox" value="miercoles1214" id="miercoles1214" name="horario[]"
                                           disabled></td>
                                <td><input type="checkbox" value="miercoles1416" id="miercoles1416" name="horario[]"
                                           disabled></td>
                                <td><input type="checkbox" value="miercoles1618" id="miercoles1618" name="horario[]"
                                           disabled></td>
                                <td><input type="checkbox" value="miercoles1820" id="miercoles1820" name="horario[]"
                                           disabled></td>
                            </tr>
                            <tr>
                                <th>JUEVES</th>
                                <td><input type="checkbox" value="jueves810" id="jueves810" name="horario[]" disabled>
                                </td>
                                <td><input type="checkbox" value="jueves1012" id="jueves1012" name="horario[]" disabled>
                                </td>
                                <td><input type="checkbox" value="jueves1214" id="jueves1214" name="horario[]" disabled>
                                </td>
                                <td><input type="checkbox" value="jueves1416" id="jueves1416" name="horario[]" disabled>
                                </td>
                                <td><input type="checkbox" value="jueves1618" id="jueves1618" name="horario[]" disabled>
                                </td>
                                <td><input type="checkbox" value="jueves1820" id="jueves1820" name="horario[]" disabled>
                                </td>
                            </tr>
                            <tr>
                                <th>VIERNES</th>
                                <td><input type="checkbox" value="viernes810" id="viernes810" name="horario[]" disabled>
                                </td>
                                <td><input type="checkbox" value="viernes1012" id="viernes1012" name="horario[]"
                                           disabled></td>
                                <td><input type="checkbox" value="viernes1214" id="viernes1214" name="horario[]"
                                           disabled></td>
                                <td><input type="checkbox" value="viernes1416" id="viernes1416" name="horario[]"
                                           disabled></td>
                                <td><input type="checkbox" value="viernes1618" id="viernes1618" name="horario[]"
                                           disabled></td>
                                <td><input type="checkbox" value="viernes1820" id="viernes1820" name="horario[]"
                                           disabled></td>
                            </tr>
                            </tbody>
                        </table>
                        <br/>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="encuenta">Al momento de asignar mi horario tener en cuenta:</label>
                                <textarea id="encuenta" name="encuenta" class="form-control" disabled required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">ANEXOS</h3>
                            </div>
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="imagen_cedula">Fotocopia de la Cédula de Ciudadanía o Documento de
                                            Identidad Vigente</label>
                                        <input type="file" class="form-control" id="imagen_cedula" name="imagen_cedula"
                                               accept=".pdf"
                                               required disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="imagen_carnet">Fotocopia del carnet estudiantil universitario
                                            vigente</label>
                                        <input type="file" class="form-control" id="imagen_carnet" name="imagen_carnet"
                                               accept=".pdf"
                                               required disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="imagen_contraloria">Certificado de antesedentes fiscales de la
                                            contraloria</label>
                                        <input type="file" class="form-control" id="imagen_contraloria" accept=".pdf"
                                               name="imagen_contraloria" required disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="imagen_procuraduria">Certificado de antesedentes disciplinarios de
                                            la
                                            procuraduria</label>
                                        <input type="file" class="form-control" id="imagen_procuraduria" accept=".pdf"
                                               name="imagen_procuraduria"
                                               required disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="imagen_ponal">Certificado de antesedentes penales de Ponal.</label>
                                        <input type="file" class="form-control" id="imagen_ponal" accept=".pdf"
                                               name="imagen_ponal"
                                               required disabled>
                                    </div>
                                </div>
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
            <button type="submit" class="btn btn-success pull-right" id="boton" disabled><i class="fa fa-check"></i>
                Crear
            </button>
        </div>
        <!-- /.box-footer -->
        {!! Form::close() !!}
    </div>
    <!-- /.box -->
    <!-- /.box -->
</div>

<script>
    function ocultar() {
        $("#error").hide();
    }
    $(document).ready(function () {

        $("#codigo").on("keyup", function () {
            var codigo = $("#codigo").val();
            if (codigo.length > 6) {
                $("#info_codigo").html('<i class="fa fa-refresh fa-spin"></i> Verificando.....');
                var url = $("#url").val();
                $.ajax({
                    url: url + "/verificar_codigo/" + codigo,
                }).done(function (data) {
                    var datos = JSON.parse(data);
                    $("#info_codigo").html('');
                    $("#codigo_div").removeClass('has-success');
                    $("#codigo_div").removeClass('has-error');
                    $("#label_codigo").html('Código');
                    if (datos.tipo == "ok") {
                        $("#codigo_div").addClass('has-success');
                        $("#info_codigo").html(datos.mensaje);
                        $("#label_codigo").html('<i class="fa fa-check"></i> Código');
                        //
                        $("#foto").removeAttr('disabled');
                        $("#nombre").removeAttr('disabled');
                        $("#apellidos").removeAttr('disabled');
                        $("#tipo_despacho").removeAttr('disabled');
                        $("#semestre").removeAttr('disabled');
                        $("#jornada").removeAttr('disabled');
                        $("#periodo_academico").removeAttr('disabled');
                        $("#genero").removeAttr('disabled');
                        $("#fecha_nacimiento").removeAttr('disabled');
                        $("#lugar_nacimiento").removeAttr('disabled');
                        $("#documento").removeAttr('disabled');
                        $("#expedida_en").removeAttr('disabled');
                        $("#direccion_actual").removeAttr('disabled');
                        $("#estrato").removeAttr('disabled');
                        $("#barrio").removeAttr('disabled');
                        $("#telefono").removeAttr('disabled');
                        $("#celular").removeAttr('disabled');
                        $("#email").removeAttr('disabled');
                        $("#funcionario").removeAttr('disabled');
                        $("#lunes810").removeAttr('disabled');
                        $("#lunes1012").removeAttr('disabled');
                        $("#lunes1214").removeAttr('disabled');
                        $("#lunes1416").removeAttr('disabled');
                        $("#lunes1618").removeAttr('disabled');
                        $("#lunes1820").removeAttr('disabled');
                        $("#martes810").removeAttr('disabled');
                        $("#martes1012").removeAttr('disabled');
                        $("#martes1214").removeAttr('disabled');
                        $("#martes1416").removeAttr('disabled');
                        $("#martes1618").removeAttr('disabled');
                        $("#martes1820").removeAttr('disabled');
                        $("#miercoles810").removeAttr('disabled');
                        $("#miercoles1012").removeAttr('disabled');
                        $("#miercoles1214").removeAttr('disabled');
                        $("#miercoles1416").removeAttr('disabled');
                        $("#miercoles1618").removeAttr('disabled');
                        $("#miercoles1820").removeAttr('disabled');
                        $("#jueves810").removeAttr('disabled');
                        $("#jueves1012").removeAttr('disabled');
                        $("#jueves1214").removeAttr('disabled');
                        $("#jueves1416").removeAttr('disabled');
                        $("#jueves1618").removeAttr('disabled');
                        $("#jueves1820").removeAttr('disabled');
                        $("#viernes810").removeAttr('disabled');
                        $("#viernes1012").removeAttr('disabled');
                        $("#viernes1214").removeAttr('disabled');
                        $("#viernes1416").removeAttr('disabled');
                        $("#viernes1618").removeAttr('disabled');
                        $("#viernes1820").removeAttr('disabled');
                        $("#encuenta").removeAttr('disabled');
                        $("#imagen_cedula").removeAttr('disabled');
                        $("#imagen_carnet").removeAttr('disabled');
                        $("#imagen_contraloria").removeAttr('disabled');
                        $("#imagen_procuraduria").removeAttr('disabled');
                        $("#imagen_ponal").removeAttr('disabled');
                        $("#boton").removeAttr('disabled');
                    } else {
                        $("#codigo_div").addClass('has-error');
                        $("#info_codigo").html(datos.mensaje);
                        $("#label_codigo").html('<i class="fa fa-times-circle-o"></i> Código');
                        //
                        $("#foto").attr('disabled', 'true');
                        $("#nombre").attr('disabled', 'true');
                        $("#apellidos").attr('disabled', 'true');
                        $("#tipo_despacho").attr('disabled', 'true');
                        $("#semestre").attr('disabled', 'true');
                        $("#jornada").attr('disabled', 'true');
                        $("#periodo_academico").attr('disabled', 'true');
                        $("#genero").attr('disabled', 'true');
                        $("#fecha_nacimiento").attr('disabled', 'true');
                        $("#lugar_nacimiento").attr('disabled', 'true');
                        $("#documento").attr('disabled', 'true');
                        $("#expedida_en").attr('disabled', 'true');
                        $("#direccion_actual").attr('disabled', 'true');
                        $("#estrato").attr('disabled', 'true');
                        $("#barrio").attr('disabled', 'true');
                        $("#telefono").attr('disabled', 'true');
                        $("#celular").attr('disabled', 'true');
                        $("#email").attr('disabled', 'true');
                        $("#funcionario").attr('disabled', 'true');
                        $("#lunes810").attr('disabled', 'true');
                        $("#lunes1012").attr('disabled', 'true');
                        $("#lunes1214").attr('disabled', 'true');
                        $("#lunes1416").attr('disabled', 'true');
                        $("#lunes1618").attr('disabled', 'true');
                        $("#lunes1820").attr('disabled', 'true');
                        $("#martes810").attr('disabled', 'true');
                        $("#martes1012").attr('disabled', 'true');
                        $("#martes1214").attr('disabled', 'true');
                        $("#martes1416").attr('disabled', 'true');
                        $("#martes1618").attr('disabled', 'true');
                        $("#martes1820").attr('disabled', 'true');
                        $("#miercoles810").attr('disabled', 'true');
                        $("#miercoles1012").attr('disabled', 'true');
                        $("#miercoles1214").attr('disabled', 'true');
                        $("#miercoles1416").attr('disabled', 'true');
                        $("#miercoles1618").attr('disabled', 'true');
                        $("#miercoles1820").attr('disabled', 'true');
                        $("#jueves810").attr('disabled', 'true');
                        $("#jueves1012").attr('disabled', 'true');
                        $("#jueves1214").attr('disabled', 'true');
                        $("#jueves1416").attr('disabled', 'true');
                        $("#jueves1618").attr('disabled', 'true');
                        $("#jueves1820").attr('disabled', 'true');
                        $("#viernes810").attr('disabled', 'true');
                        $("#viernes1012").attr('disabled', 'true');
                        $("#viernes1214").attr('disabled', 'true');
                        $("#viernes1416").attr('disabled', 'true');
                        $("#viernes1618").attr('disabled', 'true');
                        $("#viernes1820").attr('disabled', 'true');
                        $("#encuenta").attr('disabled', 'true');
                        $("#imagen_cedula").attr('disabled', 'true');
                        $("#imagen_carnet").attr('disabled', 'true');
                        $("#imagen_contraloria").attr('disabled', 'true');
                        $("#imagen_procuraduria").attr('disabled', 'true');
                        $("#imagen_ponal").attr('disabled', 'true');
                        $("#boton").attr('disabled', 'true');
                    }
                });
            } else {
                $("#info_codigo").html('');
                $("#codigo_div").removeClass('has-success');
                $("#codigo_div").removeClass('has-error');
                //
                $("#foto").attr('disabled', 'true');
                $("#nombre").attr('disabled', 'true');
                $("#apellidos").attr('disabled', 'true');
                $("#tipo_despacho").attr('disabled', 'true');
                $("#semestre").attr('disabled', 'true');
                $("#jornada").attr('disabled', 'true');
                $("#periodo_academico").attr('disabled', 'true');
                $("#genero").attr('disabled', 'true');
                $("#fecha_nacimiento").attr('disabled', 'true');
                $("#lugar_nacimiento").attr('disabled', 'true');
                $("#documento").attr('disabled', 'true');
                $("#direccion_actual").attr('disabled', 'true');
                $("#estrato").attr('disabled', 'true');
                $("#barrio").attr('disabled', 'true');
                $("#telefono").attr('disabled', 'true');
                $("#celular").attr('disabled', 'true');
                $("#email").attr('disabled', 'true');
                $("#funcionario").attr('disabled', 'true');
                $("#lunes810").attr('disabled', 'true');
                $("#lunes1012").attr('disabled', 'true');
                $("#lunes1214").attr('disabled', 'true');
                $("#lunes1416").attr('disabled', 'true');
                $("#lunes1618").attr('disabled', 'true');
                $("#lunes1820").attr('disabled', 'true');
                $("#martes810").attr('disabled', 'true');
                $("#martes1012").attr('disabled', 'true');
                $("#martes1214").attr('disabled', 'true');
                $("#martes1416").attr('disabled', 'true');
                $("#martes1618").attr('disabled', 'true');
                $("#martes1820").attr('disabled', 'true');
                $("#miercoles810").attr('disabled', 'true');
                $("#miercoles1012").attr('disabled', 'true');
                $("#miercoles1214").attr('disabled', 'true');
                $("#miercoles1416").attr('disabled', 'true');
                $("#miercoles1618").attr('disabled', 'true');
                $("#miercoles1820").attr('disabled', 'true');
                $("#jueves810").attr('disabled', 'true');
                $("#jueves1012").attr('disabled', 'true');
                $("#jueves1214").attr('disabled', 'true');
                $("#jueves1416").attr('disabled', 'true');
                $("#jueves1618").attr('disabled', 'true');
                $("#jueves1820").attr('disabled', 'true');
                $("#viernes810").attr('disabled', 'true');
                $("#viernes1012").attr('disabled', 'true');
                $("#viernes1214").attr('disabled', 'true');
                $("#viernes1416").attr('disabled', 'true');
                $("#viernes1618").attr('disabled', 'true');
                $("#viernes1820").attr('disabled', 'true');
                $("#encuenta").attr('disabled', 'true');
                $("#imagen_cedula").attr('disabled', 'true');
                $("#imagen_carnet").attr('disabled', 'true');
                $("#imagen_contraloria").attr('disabled', 'true');
                $("#imagen_procuraduria").attr('disabled', 'true');
                $("#imagen_ponal").attr('disabled', 'true');
                $("#boton").attr('disabled', 'true');
            }
        });

    });

</script>

</body>
</html>


