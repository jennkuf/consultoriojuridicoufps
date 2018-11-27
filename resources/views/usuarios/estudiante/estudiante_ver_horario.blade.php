
@extends('estudiante_template')

@section('content')
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