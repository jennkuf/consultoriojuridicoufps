<?php
/**
 * Created by PhpStorm.
 * User: ing.Diegox
 * Date: 23/05/2016
 * Time: 8:43 PM
 */

?>
@extends('secretaria_template')

@section('content')
    <div class="col-md-12">
        <!-- USERS LIST -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Listado de Casos Sin Aceptar en el Sistema</h3>

                <!--<div class="box-tools pull-right">
                    <a href="{{URL::to('casos/recibir_nuevo')}}" class="btn btn-box-tool"><i
                                class="fa  fa-file-text-o"></i>
                        Recibir Caso</a>
                </div>-->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="col-md-12">
                    @if(count($casos) > 0)
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Area</th>
                                <th>Estudiante</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($casos as $c)
                                <tr>
                                    <td>{{$c->id}}</td>
                                    <td>{{$c->nombreusaurio}} {{$c->apellidosusuario}}</td>
                                    <td>{{$c->area}}</td>
                                    <td>{{$c->codigo}}</td>
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
                    <h4 class="modal-title" id="myModalLabel">Confirmación</h4>
                </div>
                {!! Form::open(array('url' => 'usuarios/eliminar', 'class' => 'form-horizontal', 'method' => 'post')) !!}
                <div class="modal-body">
                    ¿Está segur@ que desea eliminar el Usuario <strong id="user"></strong>?
                    <input type="hidden" id="id" name="id">
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

    <!-- Modal -->
    <div class="modal fade" id="informacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Información</h4>
                </div>
                <div class="modal-body">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-yellow">
                            <div class="widget-user-image">
                                {!! Html::image('img/usuario_admin.png', 'Icono', array('alt'=>"User Image", "class"=>"img-circle")) !!}
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username" id="nombre"></h3>
                            <h5 class="widget-user-desc">Usuario</h5>
                        </div>
                        <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                                <li><a href="#">Cedula <span class="pull-right badge bg-black-gradient"
                                                             id="cedula"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmar(id, user) {
            $('#user').html(user);
            $('#id').val(id);
        }

        function verInfo(user, cedula) {
            $('#nombre').html(user);
            $('#cedula').html(cedula);
        }
    </script>
@endsection
