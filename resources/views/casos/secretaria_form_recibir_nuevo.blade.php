<?php
/**
 * Created by PhpStorm.
 * User: ing.Diegox
 * Date: 23/05/2016
 * Time: 8:54 PM
 */
?>

@extends('estudiante_template')

@section('content')
    <div class="col-md-12">
        <!-- USERS LIST -->
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Recibir Nuevo Caso</h3>
            </div>
            <!-- /.box-header -->
            {!! Form::open(array('url' => 'casos/nuevo', 'method' => 'post')) !!}
            <div class="col-md-12">
                <div class="form-group">
                    <label for="tipo_despacho">Tipo de Consulta:</label>
                    <select class="form-control" name="tipo_despacho" id="tipo_despacho">
                        <option value="CIVIL">CIVIL</option>
                        <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                        <option value="LABORAL">LABORAL</option>
                        <option value="PENAL">PENAL</option>
                    </select>
                </div>
                <div class="box-body no-padding">
                    <div class="box box-danger">
                        <div class="box-header">
                            <i class="fa fa-user"></i>

                            <h3 class="box-title"> Datos Básicos del Solicitante</h3>
                        </div>
                        <div class="box-body">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="documento">Número de Documento:</label>

                                    <div class="input-group input-group-sm">
                                        <input type="number" class="form-control" name="documento" id="documento"
                                               placeholder="Número de Documento..." required min="100000">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat"
                                                onclick="buscarUser('{{URL::to('/')}}')" id="buscaruser"><i
                                                    class="fa fa-search" id="iconuser"></i></button>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" placeholder="Nombre..." id="nombre"
                                           name="nombre" required="true" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="apellidos">Apellidos:</label>
                                    <input type="text" class="form-control" placeholder="Apellidos..."
                                           id="apellidos" name="apellidos"
                                           required="true" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="genero">Género:</label>
                                    <select class="form-control" name="genero" id="genero" disabled>
                                        <option value="MASCULINO">MASCULINO</option>
                                        <option value="FEMENINO">FEMENINO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                                    <input type="date" class="form-control" id="fecha_nacimiento"
                                           name="fecha_nacimiento" required="true" placeholder="Fecha de Nacimiento..."
                                           disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="lugar_nacimiento">Lugar de
                                        Nacimiento:</label>
                                    <input type="text" class="form-control" id="lugar_nacimiento"
                                           name="lugar_nacimiento" required="true" placeholder="Lugar de Nacimiento..."
                                           disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="discapacidad">Discapacidad:</label>
                                    <input type="text" class="form-control" id="discapacidad" name="discapacidad"
                                           required="true" placeholder="Discapacidad..." disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="vulnerabilidad">Vulnerabilidad:</label>
                                    <input type="text" class="form-control" id="vulnerabilidad"
                                           name="vulnerabilidad"
                                           required="true" placeholder="Vulnerabilidad..." disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="direccion_actual">Dirección
                                        Actual:</label>
                                    <input type="text" class="form-control" id="direccion_actual"
                                           name="direccion_actual"
                                           required="true" placeholder="Dirección..." disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="estrato">Estrato:</label>
                                    <input type="number" class="form-control" id="estrato" name="estrato" min="0"
                                           max="10"
                                           required="true" placeholder="Estrato..." disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="barrio">Barrio:</label>
                                    <input type="text" class="form-control" id="barrio" name="barrio"
                                           required="true" placeholder="Barrio..." disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ciudad">Ciudad:</label>
                                    <input type="text" class="form-control" id="ciudad" name="ciudad"
                                           required="true" placeholder="Ciudad..." disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telefono">Teléfono:</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono"
                                           required="true" placeholder="Telefono..." disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="celular">Celular:</label>
                                    <input type="text" class="form-control" id="celular" name="celular"
                                           required="true" placeholder="Celular..." disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           required="true" placeholder="Email..." disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <div class="box box-danger">
                            <!--<div class="box-header">
                                <i class="fa fa-mortar-board"></i>

                                <h3 class="box-title"> Alumno que Recepciona</h3>
                            </div>
                            <div class="box-body" id="cargar">
                                <label for="email" class="col-sm-2 control-label">Codigo Estudiante:</label>

                                <div class="input-group input-group-sm">

                                    <input type="number" class="form-control" name="codigo" id="codigo" required
                                           placeholder="Digite el codigo del estudiante para buscarlo..." min="1000">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat"
                                                onclick="buscar('{{URL::to('/')}}')"><i
                                                    class="fa fa-search"></i></button>
                                    </span>
                                </div>
                                <br/>
                                <center><label style="color: red;">No se ha seleccionado el estudiante que recepciona el
                                        caso.</label></center>
                                <br/>
                            </div>-->
                            <div class="box-body">
                                <div class="col-md-12">
                                    <label for="motivo">Motivo de la Consulta:</label>
                                    <textarea id="motivo" name="motivo" class="form-control" required
                                              placeholder="Digite el motivo de la consulta..."></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="recomendaciones">Recomendaciones del Consultorio:</label>
                                    <textarea id="recomendaciones" name="recomendaciones" class="form-control" required
                                              placeholder="Digite las recomendaciones del consultorio..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <input type="hidden" name="codigo_estudiante" value="" id="codigo_estudiante">

            <div class="box-footer">
                <a href="{{URL::to('casos')}}" class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</a>
                <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Recibir
                </button>
            </div>
            {!! Form::close()  !!}
                    <!-- /.box-footer -->
        </div>
        <!--/.box -->

    </div>

    <script>
        function buscar(url) {
            var codigo = $("#codigo").val();
            var x = 'onclick="buscar(\'' + url + '\')"';
            var mostrar = "<label for='email' class='col-sm-2 control-label'>Codigo Estudiante:</label><div class='input-group input-group-sm'><input type='number' class='form-control' name='codigo' id='codigo' value='" + codigo + "' required><span class='input-group-btn'><button type='button' class='btn btn-info btn-flat'" + x + "><i class='fa fa-search'></i></button></span></div>";
            if (codigo) {
                $("#cargar").html("<div class='overlay'><i class='fa fa-refresh fa-spin'></i></div>");
                $.ajax({
                    url: url + "/buscar_estudiante_asignar/" + codigo,
                    context: document.body
                }).done(function (data) {
                    //alert(data);
                    var datos = JSON.parse(data);
                    if (datos.estado == 'ok') {
                        //alert(datos.estudiante);
                        if (datos.estudiante != null) {
                            $("#codigo_estudiante").val(codigo);
                            mostrar += "<br><br><div class='row'><table class='table table-bordered'>";
                            mostrar += "<thead>";
                            mostrar += "<tr>";
                            mostrar += "<th>Código</th>";
                            mostrar += "<th colspan='2'>Apellidos</th>";
                            mostrar += "<th colspan='2'>Nombres</th>";
                            mostrar += "<th colspan='2'>Área</th>";
                            mostrar += "</tr>";
                            mostrar += "</thead>";
                            mostrar += "<tbody>";
                            mostrar += "<tr>";
                            mostrar += "<td>" + datos.estudiante.codigo + "</td>";
                            mostrar += "<td colspan='2'>" + datos.estudiante.apellidos + "</td>";
                            mostrar += "<td colspan='2'>" + datos.estudiante.nombre + "</td>";
                            mostrar += "<td colspan='2'>" + datos.estudiante.tipo_despacho + "</td>";
                            mostrar += "</tr>";
                            mostrar += "</tbody>";
                            mostrar += "<thead>";
                            mostrar += "<tr>";
                            mostrar += "<th>Código Del Plan</th>";
                            mostrar += "<th>Nombre del Plan</th>";
                            mostrar += "<th>Semestre</th>";
                            mostrar += "<th>Sede</th>";
                            mostrar += "<th>Jornada</th>";
                            mostrar += "<th>Periódo Académico</th>";
                            mostrar += "</tr>";
                            mostrar += "</thead>";
                            mostrar += "<tbody>";
                            mostrar += "<tr>";
                            mostrar += "<td>" + datos.estudiante.codigo_plan + "</td>";
                            mostrar += "<td>" + datos.estudiante.nombre_plan + "</td>";
                            mostrar += "<td>" + datos.estudiante.semestre + "</td>";
                            mostrar += "<td>" + datos.estudiante.sede + "</td>";
                            mostrar += "<td>" + datos.estudiante.jornada + "</td>";
                            mostrar += "<td>" + datos.estudiante.periodo_academico + "</td>";
                            mostrar += "</tr>";
                            mostrar += "</tbody>";
                            mostrar += "</table></div>";
                        } else {
                            $("#codigo_estudiante").val('');
                            mostrar += "<br><br>No se encuentra un estudiante registrado con el código indicado.";
                        }
                    } else {
                        $("#codigo_estudiante").val('');
                        mostrar += "<br><br>Ha ocurrido un error.";
                    }
                    $("#cargar").html(mostrar);
                });
            } else {
                $("#codigo_estudiante").val('');
                alert("Debe digitar un código");
            }
        }

        function buscarUser(url) {
            var documento = $("#documento").val();
            if (documento) {
                $("#documento").attr('disabled', 'true');
                $("#buscaruser").attr('disabled', 'true');
                $("#iconuser").removeClass('fa-search');
                $("#iconuser").html(' Buscando...');
                $("#iconuser").addClass('fa-spinner');
                $.ajax({
                    url: url + "/buscar_usuario/" + documento,
                    context: document.body
                }).done(function (data) {
                    //alert(data);
                    var datos = JSON.parse(data);
                    if (datos.estado == 'ok') {
                        //alert(datos.estudiante);
                        if (datos.usuario != null) {
                            alert(datos.usuario.nombre);
                            $("#documento").removeAttr('disabled');
                            $("#buscaruser").removeAttr('disabled');
                            $("#iconuser").removeClass('fa-spinner');
                            $("#iconuser").html('');
                            $("#iconuser").addClass('fa-search');

                            $("#nombre").val(datos.usuario.nombre);
                            $("#apellidos").val(datos.usuario.apellidos);
                            //$("#genero").val(datos.usuario.genero);
                            var genero = datos.usuario.genero;
                            $('#genero > option[value=genero]').attr('selected', 'selected');
                            $("#fecha_nacimiento").val(datos.usuario.fecha_nacimiento);
                            $("#lugar_nacimiento").val(datos.usuario.lugar_nacimiento);
                            $("#discapacidad").val(datos.usuario.discapacidad);
                            $("#vulnerabilidad").val(datos.usuario.vulnerabilidad);
                            $("#direccion_actual").val(datos.usuario.direccion_actual);
                            $("#estrato").val(datos.usuario.estrato);
                            $("#barrio").val(datos.usuario.barrio);
                            $("#ciudad").val(datos.usuario.ciudad);
                            $("#telefono").val(datos.usuario.telefono);
                            $("#celular").val(datos.usuario.celular);
                            $("#email").val(datos.usuario.email);
                        }else{
                            $("#documento").removeAttr('disabled');
                            $("#buscaruser").removeAttr('disabled');
                            $("#iconuser").removeClass('fa-spinner');
                            $("#iconuser").html('');
                            $("#iconuser").addClass('fa-search');

                            $("#nombre").removeAttr('disabled');
                            $("#nombre").val("");
                            $("#apellidos").removeAttr('disabled');
                            $("#apellidos").val("");
                            $("#genero").removeAttr('disabled');
                            $("#genero").val("");
                            $("#fecha_nacimiento").removeAttr('disabled');
                            $("#fecha_nacimiento").val("");
                            $("#lugar_nacimiento").removeAttr('disabled');
                            $("#lugar_nacimiento").val("");
                            $("#discapacidad").removeAttr('disabled');
                            $("#discapacidad").val("");
                            $("#vulnerabilidad").removeAttr('disabled');
                            $("#vulnerabilidad").val("");
                            $("#direccion_actual").removeAttr('disabled');
                            $("#direccion_actual").val("");
                            $("#estrato").removeAttr('disabled');
                            $("#estrato").val("");
                            $("#barrio").removeAttr('disabled');
                            $("#barrio").val("");
                            $("#ciudad").removeAttr('disabled');
                            $("#ciudad").val("");
                            $("#telefono").removeAttr('disabled');
                            $("#telefono").val("");
                            $("#celular").removeAttr('disabled');
                            $("#celular").val("");
                            $("#email").removeAttr('disabled');
                            $("#email").val("");

                        }
                    }
                });
            }
            else {
                $("#documento").val('');
                alert("Debe digitar un documento");

                $("#nombre").attr('disabled', 'true');
                $("#nombre").val("");
                $("#apellidos").attr('disabled', 'true');
                $("#apellidos").val("");
                $("#genero").attr('disabled', 'true');
                $("#fecha_nacimiento").attr('disabled', 'true');
                $("#fecha_nacimiento").val("");
                $("#lugar_nacimiento").attr('disabled', 'true');
                $("#lugar_nacimiento").val("");
                $("#discapacidad").attr('disabled', 'true');
                $("#discapacidad").val("");
                $("#vulnerabilidad").attr('disabled', 'true');
                $("#vulnerabilidad").val("");
                $("#direccion_actual").attr('disabled', 'true');
                $("#direccion_actual").val("");
                $("#estrato").attr('disabled', 'true');
                $("#estrato").val("");
                $("#barrio").attr('disabled', 'true');
                $("#barrio").val("");
                $("#ciudad").attr('disabled', 'true');
                $("#ciudad").val("");
                $("#telefono").attr('disabled', 'true');
                $("#telefono").val("");
                $("#celular").attr('disabled', 'true');
                $("#celular").val("");
                $("#email").attr('disabled', 'true');
                $("#email").val("");
            }

        }
    </script>

@endsection

