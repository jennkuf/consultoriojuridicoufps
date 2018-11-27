<?php
/**
 * Created by PhpStorm.
 * User: ing.Diegox
 * Date: 2/06/2016
 * Time: 8:54 PM
 */
?>
@extends("jefe_area_template")
@section('content')
    <div class="col-md-12">
        <!-- USERS LIST -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Seguimiento al caso {{$caso->id}} del estudiante:
                    <b>{{$estudiante->apelldios}} {{$estudiante->nombre}}</b></h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">

            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">

            </div>
            <!-- /.box-footer -->
        </div>
        <!--/.box -->

    </div>
@endsection

