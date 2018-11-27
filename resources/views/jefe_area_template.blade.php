<?php
/**
 * Created by PhpStorm.
 * User: ing.Diegox
 * Date: 22/05/2016
 * Time: 7:29 PM
 */
?>
        <!DOCTYPE  html>
<!--cargamos nuestro modulo en la etiqueta html con ng-app-->
<html>
<head>
    <link rel="shortcut icon" href="{{URL::to('img/icon.ico')}}" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TEMIS</title>
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
            TEMIS
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
                                    <small>{!! session('area') !!}</small>
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
                    <a href="#"><i class="fa fa-circle text-success"></i> {!! session('area') !!}</a>
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
                        <li><a href="{!! URL::to('estudiantes/area') !!}"><i class="fa fa-user-secret"></i><span>Estudiantes</span></a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-balance-scale"></i> <span>Casos</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{!! URL::to('casos/pendientes/area') !!}"><i class="fa  fa-hourglass-3"></i><span>Casos</span></a></li>
                    </ul>
                </li>
                <li><a href="{!! URL::to('logout') !!}"><i class="fa fa-user-secret"></i><span>Cerrar Sesión</span></a></li>
                
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
        <div>
            @yield('content')
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
{!! Html::script('AdminLTE-2.3.0/plugins/sparkline/jquery.sparkline.min.js') !!}
        <!-- jvectormap -->
{!! Html::script('AdminLTE-2.3.0/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
{!! Html::script('AdminLTE-2.3.0/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
        <!-- SlimScroll 1.3.0 -->
{!! Html::script('AdminLTE-2.3.0/plugins/slimScroll/jquery.slimscroll.min.js') !!}
        <!-- ChartJS 1.0.1 -->
{!! Html::script('AdminLTE-2.3.0/plugins/chartjs/Chart.min.js') !!}
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{!! Html::script('AdminLTE-2.3.0/dist/js/pages/dashboard2.js') !!}
        <!-- AdminLTE for demo purposes -->
{!! Html::script('AdminLTE-2.3.0/dist/js/demo.js') !!}

<div class="jvectormap-label"></div>
</body>
<script>
    function ocultar() {
        $("#error").hide();
    }
</script>
</html>
