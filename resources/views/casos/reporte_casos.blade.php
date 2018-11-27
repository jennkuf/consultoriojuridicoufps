<?php
/**
 * Created by PhpStorm.
 * User: ing.Diegox
 * Date: 2/06/2016
 * Time: 9:28 PM
 */
?>
@extends("director_template")
@section("content")
<div class="col-md-12">
    <!-- USERS LIST -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Reporte de Casos</h3>
        </div>
        <div class="box-body no-padding">
            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Casos por Área</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="chart-responsive">
                                    <div id="piechart"></div>
                                </div>
                                <!-- ./chart-responsive -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                        <ul class="nav nav-pills nav-stacked">

                        </ul>
                    </div>
                    <!-- /.footer -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Casos por Estado</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="chart-responsive">
                                    <div id="piechart2"></div>
                                </div>
                                <!-- ./chart-responsive -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                        <ul class="nav nav-pills nav-stacked">

                        </ul>
                    </div>
                    <!-- /.footer -->
                </div>
            </div>

            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Casos por Área</h3>

                    </div>
                    <div class="box-body">
                        <div class="row">
                            <h3>Filtros:</h3>

                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Filtrar por Area</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <select id="area" class="form-control">
                                                <option value="TODOS">TODOS</option>
                                                <option value="CIVIL">CIVIL</option>
                                                <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                                                <option value="LABORAL">LABORAL</option>
                                                <option value="PENAL">PENAL</option>
                                                <option value="FAMILIA">FAMILIA</option>
                                            </select>
                                            <button class="btn btn-warning"
                                                    onclick="filtrarArea('{{URL::to('/')}}')">Filtrar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Filtrar por Estudiante</h3>
                                    </div>
                                    <div class="panel-body">
                                        @if(count($casos)>0)
                                        <select id="estudiante" class="form-control">
                                            <option value="TODOS">TODOS</option>
                                            @foreach($casos as $ca)
                                            <option value="{{$ca->codigo}}">{{$ca->codigo}}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-info" onclick="filtrarEst('{{URL::to('/')}}')">
                                            Filtrar
                                        </button>
                                        @else
                                        No se han registrado casos por estudiantes
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <br/><br/>
                            <div class="col-md-12" id="tabla">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Listado de casos</h3>
                                        <button class="btn btn-default" onclick="window.print();"><i class="fa fa-cloud-download"></i> Pdf</button>
                                    </div>
                                    @if(count($casos) > 0)
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>FECHA</th>
                                                <th>MOTIVO</th>
                                                <th>RECOMENDACIONES</th>
                                                <th>AREA</th>
                                                <th>ESTADO</th>
                                                <th>CODIGO ESTUDIANTE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($casos as $c)
                                            <tr>
                                                <td>{{$c->id_caso}}</td>
                                                <td>{{$c->fecha_caso}}</td>
                                                <td>{{$c->motivo_consulta}}</td>
                                                <td>{{$c->recomendaciones}}</td>
                                                <td>{{$c->area_caso}}</td>
                                                <td>{{$c->estado_caso}}</td>
                                                <td>{{$c->codigo}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    No existen casos registrados...
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawChart2);
    function drawChart() {

    var data = google.visualization.arrayToDataTable([
    ['AREA', 'CANTIDAD'],
    ['CIVIL', <?php echo $civil; ?>],
    ['ADMINISTRATIVO', <?php echo $administrativo; ?>],
    ['LABORAL', <?php echo $laboral; ?>],
    ['PENAL', <?php echo $penal; ?>],
    ['FAMILIA', <?php echo $familia; ?>]
    ]);
    var options = {
    title: ''
    };
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
    }
    function drawChart2() {

    var data = google.visualization.arrayToDataTable([
    ['ESTADO', 'CANTIDAD'],
    ['SIN ASIGNAR', <?php echo $nuevo; ?>],
    ['ASIGNADO', <?php echo $asignado; ?>],
    ['RECHAZADO', <?php echo $rechazado; ?>]
    ]);
    var options = {
    title: ''
    };
    var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
    chart.draw(data, options);
    }

    function filtrarArea(url) {
    var area = $("#area").val();
    $("#tabla").html('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
    $.ajax({
    url: url + "/casos_area/" + area,
    }).done(function (data) {
    $("#tabla").html(data);
    });
    }
    function filtrarEst(url) {
    var codigo = $("#estudiante").val();
    $("#tabla").html('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
    $.ajax({
    url: url + "/casos_estudiante/" + codigo,
    }).done(function (data) {
    $("#tabla").html(data);
    });
    }
</script>
@endsection

