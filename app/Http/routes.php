<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use \Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

//RUTA PARA IR AL INICIO
Route::get('/', function () {
    if (Auth::check()) {
        if (session('rol') == 'secretaria') {
            return view('secretaria_template');
        }
        if (session('rol') == 'jefe_area') {
            return view('jefe_area_template');
        }
        if (session('rol') == 'estudiante') {
            return view('estudiante_template');
        }
        if (session('rol') == 'director') {
            return view('director_template');
        }
        if (session('rol') == 'usuario') {
            return view('usuario_template');
        }
    }
    return view('welcome');
});

//RUTA PARA INICIAR SESIÓN Y VERIFICAR LSO DATOS DE ACCESO
Route::post('inicio_sesion', array(
    'uses' => "UserController@inicio_sesion"
));

//RUTA PARA CERRAR SESIÓN
Route::get('logout', array(
    'uses' => 'UserController@logout'
));

//RUTA PARA VER EL FORMULARIO DE MATRICULA DE UN ESTUDIANTE
Route::get('matricula', array(
    'uses' => 'EstudianteController@verFormCrearUser'
));

//RUTA PARA MATRICULAR ESTUDIANTE
Route::post('matricula/crear', array(
    'uses' => "EstudianteController@crearEstudiante"
));

//RUTA QUE VERIFICA EL CÓDIGO DEL ESTUDIANTE
Route::get('verificar_codigo/{codigo}', array(
    'uses' => 'EstudianteController@verificarCodigo'
));

//RUTA QUE MUESTRA LOS ESTUDIANTES ASPIRANTES
Route::get('estudiantes/aspirantes', array(
    'uses' => 'EstudianteController@verAspirantes'
));

//RUTA QUE MUESTRA LA INFORMACIÓN DE UN USUARIO ASPIRANTE
Route::get('estudiantes/aspirantes/informacion/{id}', array(
    'uses' => 'EstudianteController@verInformacionAspirante'
));

//RUTA QUE GUARDA LA OBSERVACIÓN PARA UN ESTUDIANTE
Route::post('estudiantes/posponer_matricula', array(
    'uses' => 'EstudianteController@posponerMatricula'
));

//RUTA PARA RECHAZAR UN ESTUDIANTE ASPIRANTE
Route::post('estudiantes/rechazar_matricula', array(
    'uses' => 'EstudianteController@rechazarMatricula'
));

//RUTA PARA ACEPTAR UN ESTUDIANTE EN EL CONSULTORIO
Route::post('estudiantes/aceptar_matricula', array(
    'uses' => 'EstudianteController@aceptarMatricula'
));

//RUTA QUE MUESTRA LOS ESTUDIANTES RECHAZADOS
Route::get('estudiantes/rechazados', array(
    'uses' => 'EstudianteController@verRechazados'
));

//RUTA QUE MUESTRA LA INFORMACIÓN DE UN USUARIO RECHAZADO
Route::get('estudiantes/rechazados/informacion/{id}', array(
    'uses' => 'EstudianteController@verInformacionRechazado'
));

//RUTA QUE MUESTRA LOS ESTUDIANTES ACEPTADOS
Route::get('estudiantes/aceptados', array(
    'uses' => 'EstudianteController@verAceptados'
));

//RUTA QUE MUESTRA LA INFORMACIÓN DE LOS USUARIOS ACEPTADOS
Route::get('estudiantes/aceptados/informacion/{id}', array(
    'uses' => 'EstudianteController@verInformacionAceptado'
));

Route::get('estudiantes/aceptados/info/{id}', array(
    'uses' => 'EstudianteController@verInformacionAceptado2'
));

//RUTA QUE DEVUELVE LOS ESTUDIANTES ACEPTADOS SEGÚN EL AREA
Route::get('estudiantes/area', array(
    'uses' => 'EstudianteController@estudiantesByArea'
));
/*************************************
 * ADMINISTRACION DE USUARIOS
 ************************************/
Route::get('estudiantes', array(
    'uses' => 'UserController@estudiantes',
    'as' => 'estudiantes'
));

Route::get('buscar_estudiante_asignar/{codigo}', array(
    'uses' => 'UserController@buscar_estudiante_asignar'
));

Route::get('buscar_usuario/{documento}', array(
    'uses' => 'UserController@buscarUsuario'
));


Route::post('estudiantes/eliminar', array(
    'uses' => 'UserController@eliminar'
));

//JEFE DE AREA
Route::get('jefes_area', array(
    'uses' => 'JefeAreaController@jefesArea'
));
Route::get('jefes_area/aceptados', array(
    'uses' => 'JefeAreaController@jefesAreaAceptados'
));
Route::get('jefes_area/pendientes', array(
    'uses' => 'JefeAreaController@jefesAreaSinAceptar'
));
Route::get('jefes_area/rechazados', array(
    'uses' => 'JefeAreaController@jefesAreaRechazado'
));
Route::get('jefe_area/crear', array(
    'uses' => 'JefeAreaController@formCrearJefeArea'
));
Route::post('jefes_area/crear_jefe', array(
    'uses' => 'JefeAreaController@crearJefe'
));
Route::get('jefes_area/estado/{id}/{estado}', array(
    'uses' => 'JefeAreaController@jefesEstado'
));

Route::get('jefes_area/reporte_casos', array(
    'uses' => 'CasoController@reporteJefeArea'
));

/************************
 ********* CASOS ********
 ***********************/
//RUTA QUE MUESTRA TODOS LOS CASOS PENDIENTES
Route::get('casos', array(
    'uses' => 'CasoController@casosPendientes'
));

//RUTA QUE MUESTRA EL FORMULARIO PARA RECIBIR EL CASO
Route::get('casos/recibir_nuevo', array(
    'uses' => 'CasoController@verFormRecibirCaso'
));

//RUTA QUE GUARDA LA INFORMACIÓN DEL CASO NUEVO
Route::post('casos/nuevo', array(
    'uses' => 'CasoController@nuevoCaso'
));

Route::get("casos/pendientes/area", array(
    'uses' => 'CasoController@casosAreaPendientes'
));

Route::post("casos/asignar", array(
    'uses' => 'CasoController@asignarEstudianteCaso'
));

Route::get('estudinate/casos/asignados', array(
    'uses' => 'CasoController@casosAsignadosEstudiante'
));

Route::post('casos/seguimiento', array(
    'uses' => 'CasoController@seguimiento'
));

Route::get('casos/asignados/estudiante/{id}', array(
    'uses' => 'EstudianteController@casosEstudianteArea'
));

Route::get("caso/seguimiento/estudiante/{id_caso}/{id_estudiante}", array(
    'uses' => "EstudianteController@verSeguimientoCasoEstudiante"
));

Route::get('reporte/casos', array(
    'uses' => 'CasoController@reporteCasos'
));

Route::get('casos_area/{area}', array(
   'uses' =>  'CasoController@casos_area'
));

Route::get('casos_estado/{area}', array(
   'uses' =>  'CasoController@casos_estado'
));

Route::get('casos_estudiante/{codigo}', array(
    'uses' =>  'CasoController@casos_estudiante'
));

Route::get('casos/ver_seguimiento/{id}', array(
    'uses' => 'CasoController@verseguimietno'
));

Route::get('mis_casos', array(
    'uses' => 'CasoController@miscasos'
)); 

Route::get('miHorario', array(
    'uses' => 'EstudianteController@verMiHorario'
));