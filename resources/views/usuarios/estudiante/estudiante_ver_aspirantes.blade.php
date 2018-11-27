<?php
/**
 * Created by PhpStorm.
 * User: ing.Diegox
 * Date: 30/05/2016
 * Time: 8:22 PM
 */
?>
@extends('director_template')

@section('content')
    <div class="col-md-12">
        <!-- USERS LIST -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Listado de Estudiantes del Sistema</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                @if(count($aspirantes) > 0)
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>CÓDIGO</th>
                                <th>NOMBRE</th>
                                <th>DOCUMENTO</th>
                                <th>AREA ASPIRA</th>
                                <th>OPCIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($aspirantes as $u)
                                <tr>
                                    <td>{{$u->codigo}}</td>
                                    <td>{{$u->apellidos}} {{$u->nombre}}</td>
                                    <td>{{$u->documento}}</td>
                                    <td>{{$u->tipo_despacho}}</td>
                                    <td><a href="{{URL::to('estudiantes/aspirantes/informacion/'.$u->id)}}"
                                           class="btn btn-warning"><i class="fa fa-info"> </i> Mas Información</a></td>
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

@endsection
