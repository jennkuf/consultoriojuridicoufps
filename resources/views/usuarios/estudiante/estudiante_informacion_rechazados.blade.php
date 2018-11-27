<?php
/**
 * Created by PhpStorm.
 * User: ing.Diegox
 * Date: 1/06/2016
 * Time: 10:29 PM
 */

?>
<html>
<head>
    <link rel="shortcut icon" href="{{URL::to('img/icon.ico')}}"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ConsultorioJurídico</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    {!! Html::style("AdminLTE-2.3.0/bootstrap/css/bootstrap.min.css") !!}
            <!-- Font Awesome -->
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

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css"></style>
    <style type="text/css">.jqstooltip {
            position: absolute;
            left: 0px;
            top: 0px;
            visibility: hidden;
            background: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.6);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
            color: white;
            font: 10px arial, san serif;
            text-align: left;
            white-space: nowrap;
            padding: 5px;
            border: 1px solid white;
            z-index: 10000;
        }

        .jqsfield {
            color: white;
            font: 10px arial, san serif;
            text-align: left;
        }</style>
</head>
<body class="fixed skin-red">
<div class="wrapper">

    <header class="main-header">
        <a href="{{ URL::to('/') }}" class="logo">
            <!-- LOGO -->
            ConsultorioJurídico
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!--<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>-->

                            <span class="hidden-xs"><i class="fa fa-cogs"></i> </span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />-->
                                {!! Html::image('img/usuario.png', 'Icono', array('class' =>'img-circle', 'alt'=>"User Image")) !!}
                                <p>
                                    {!! session('name') !!}
                                    <small>Registrado</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <!--<li class="user-body">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </li>-->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <!--<div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>-->
                                <div class="pull-right">
                                    <a href="{{ URL::to('logout') }}" class="btn btn-default btn-flat">Cerrar Sesión</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="height: auto;">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    {!! Html::image('img/usuario.png', 'Icono', array('class' =>'img-circle', 'alt'=>"User Image")) !!}
                </div>
                <div class="pull-left info">
                    <p>{!! session('name') !!}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> En línea</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MENÚ PRINCIPAL</li>
                <li>

                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>Estudiantes</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{!! URL::to('estudiantes/aspirantes') !!}"><i class="fa fa-user-secret"></i><span>Aspirantes</span></a>
                        </li>
                        <li><a href="{!! URL::to('estudiantes/aceptados') !!}"><i
                                        class="fa fa-user"></i><span>Aceptados</span></a></li>
                        <li><a href="{!! URL::to('estudiantes/rechazados') !!}"><i class="fa fa-user"></i><span>Rechazados</span></a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-balance-scale"></i> <span>Casos</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{!! URL::to('/') !!}"><i class="fa  fa-hourglass-3"></i><span>Casos</span></a></li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>


    <div class="content-wrapper" style="min-height: 916px;">
        <!-- Content Wrapper. Contains page content -->
        @if (!empty(session('error')) || !empty(session('mensaje')))
            <div class="col-md-6" id="error">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <button type="button" class="close" onclick="ocultar()">×</button>
                        <i class="fa fa-warning"></i>

                        <h3 class="box-title">Información</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        @if (!empty(session('error')))
                            <div class="alert alert-danger alert-dismissible">
                                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                                {!! session('error') !!}
                            </div>
                        @endif
                        @if (!empty(session('mensaje')))
                            <div class="alert alert-success alert-dismissible">
                                <h4><i class="icon fa fa-check"></i> ¡Felicidades!</h4>
                                {!! session('mensaje') !!}
                            </div>
                        @endif
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        @endif
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <a href="{{URL::to('/')}}"><img src="{{URL::to('img/logo.jpg')}}" style="width:5%;"></a>

                    <h3 class="box-title">FORMATO HOJA DE VIDA DE ESTUDIANTES RECHAZADOS</h3>

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
                    <a href="{{URL::to('/')}}" class="btn btn-danger"><i class=""></i> Volver</a>

                </div>
                <!-- /.box-footer -->

            </div>
            <!-- /.box -->
            <!-- /.box -->
        </div>
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 0.0.1
        </div>
        <strong>Copyright © 2016 <a href="http://ingsistemas.ufps.edu.co/" target="_blank">UFPS © </a></strong>
        Todos los Derechos Reservados.
    </footer>

    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg" style="position: fixed; height: auto;"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script async="" src="//www.google-analytics.com/analytics.js"></script>
{!! Html::script('AdminLTE-2.3.0/dist/js/jquery-1.11.3.min.js') !!}
{!! Html::script('AdminLTE-2.3.0/plugins/jQuery/jQuery-2.1.4.min.js') !!}
        <!-- Bootstrap 3.3.5 -->
{!! Html::script('AdminLTE-2.3.0/bootstrap/js/bootstrap.min.js') !!}
        <!-- FastClick -->
{!! Html::script('AdminLTE-2.3.0/plugins/fastclick/fastclick.js') !!}
        <!-- AdminLTE App -->
{!! Html::script('AdminLTE-2.3.0/dist/js/app.min.js') !!}
        <!-- Sparkline -->
{!! Html::script('plugins/sparkline/jquery.sparkline.min.js') !!}
        <!-- jvectormap -->
{!! Html::script('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
{!! Html::script('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
        <!-- SlimScroll 1.3.0 -->
{!! Html::script('plugins/slimScroll/jquery.slimscroll.min.js') !!}
        <!-- ChartJS 1.0.1 -->
{!! Html::script('plugins/chartjs/Chart.min.js') !!}
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{!! Html::script('dist/js/pages/dashboard2.js') !!}
        <!-- AdminLTE for demo purposes -->
{!! Html::script('dist/js/demo.js') !!}

<div class="jvectormap-label"></div>
</body>

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

</script>
</html>
