<!DOCTYPE  html>
<!--cargamos nuestro modulo en la etiqueta html con ng-app-->
<html lang="es" ng-app="app">
<head>
    <meta charset="UTF-8" />
    <title>TEMIS</title>
    {!! Html::style('AdminLTE-2.3.0/dist/css/AdminLTE.css') !!}
    {!! Html::style('AdminLTE-2.3.0/bootstrap/css/bootstrap.css') !!}
    {!! Html::script('AdminLTE-2.3.0/dist/js/jquery-1.11.3.min.js') !!}
    {!! Html::script('AdminLTE-2.3.0/plugins/jQuery/jQuery-2.1.4.min.js') !!}
    <link rel="shortcut icon" href="{{URL::to('img/icon.ico')}}" />
</head>

<style type="text/css">
    body{
        background-image: url("img/inicio.jpg");
        height: 100%; 
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    div.caja{
        background-color: #FFFFFF;   
        width: 430px; 
        height: 450px;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        border-radius: 20px;
        opacity: 0.95;
    }
</style>

<body  >
     


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
<div class="caja">
<div class="login-box">

    <center><img src="{{URL::to('img/logo.jpg')}}" style="width:30%;"></center>
    <div class="login-logo">
        <h1>Bienvenido a <b>TEMIS</b></h1>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body" style="background-color: gainsboro; border-radius: 5%;">
        <p class="login-box-msg">Iniciar Sesión</p>

        {!! Form::open(array('url' => 'inicio_sesion', 'method' => 'post')) !!}
        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Usuario" name="email">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Contraseña" name="pass">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <!-- /.col -->
            <div class="col-xs-6">
                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-check"></i> Iniciar</button>
            </div>
            <div class="col-xs-6">
                <a href="{{URL::to('matricula')}}">Matricular Estudiante</a>
            </div>
            <!-- /.col -->
        </div>
        {!!Form::close()!!}



    </div>
    <!-- /.login-box-body -->
</div>
</div>

</body>
<script>
    function ocultar() {
        $("#error").hide();
    }
</script>
</html>