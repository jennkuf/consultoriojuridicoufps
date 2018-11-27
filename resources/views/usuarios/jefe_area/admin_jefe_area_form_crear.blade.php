<?php
/**
 * Created by PhpStorm.
 * User: ing.Diegox
 * Date: 23/05/2016
 * Time: 2:25 PM
 */

?>
@extends('secretaria_template')

@section('content')
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Nuevo Jefe de Área
                    del Sistema</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(array('url' => 'jefes_area/crear_jefe', 'method' => 'post')) !!}
            <div class="box-body">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nombre">Nombres</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Nombres"
                               required="true" name="nombre">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" id="apelldios" placeholder="Apellidos"
                               required="true" name="apellidos">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputPassword3">Email</label>
                        <input type="email" class="form-control" id="inputPassword3" placeholder="Email"
                               required="true" name="email">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputPassword3">Número de Documento</label>
                        <input type="number" class="form-control" id="inputPassword3" placeholder="Número de Documento"
                               required="true" name="documento">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputPassword3">Expedida en</label>
                        <input type="text" class="form-control" id="inputPassword3" placeholder="Expedida en"
                               required="true" name="ciudad_expedicion">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputPassword3">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="inputPassword3" placeholder="Fecha de Nacimiento"
                               required="true" name="fecha_nacimiento">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputPassword3">Telefono</label>
                        <input type="text" class="form-control" id="inputPassword3" placeholder="Telefono"
                               required="true" name="telefono">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputPassword3">Direccion Actual</label>
                        <input type="text" class="form-control" id="inputPassword3" placeholder="Direccion Actual"
                               required="true" name="direccion">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputPassword3">Barrio</label>
                        <input type="text" class="form-control" id="inputPassword3" placeholder="Barrio"
                               required="true" name="barrio">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inputPassword3">Ciudad</label>
                        <input type="text" class="form-control" id="inputPassword3" placeholder="Ciudad"
                               required="true" name="ciudad">
                    </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                    <label for="inputPassword3">Género</label>
                        <select class="form-control" name="genero">
                            <option value="MASCULINO">MACULINO</option>
                            <option value="FEMENINO">FEMENINO</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                    <label for="inputNombrel3">Código</label>
                        <input type="number" class="form-control" id="inputNombrel3" placeholder="Código"
                               required="true" name="codigo">
                    </div>
                </div>
                <div class="col-md-12">
                <div class="form-group">
                    <label for="inputNombrel3">Area:</label>
                        <select class="form-control" name="area">
                            <option value="CIVIL">CIVIL</option>
                            <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                            <option value="LABORAL">LABORAL</option>
                            <option value="PENAL">PENAL</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{URL::to('jefes_area')}}" class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</a>
                <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Crear</button>
            </div>
            <!-- /.box-footer -->
            {!! Form::close() !!}
        </div>
        <!-- /.box -->
        <!-- /.box -->
    </div>


@endsection
