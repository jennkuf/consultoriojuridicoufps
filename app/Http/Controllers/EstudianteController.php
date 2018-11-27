<?php

/**
 * Created by PhpStorm.
 * User: ing.Diegox
 * Date: 28/05/2016
 * Time: 11:42 AM
 */

namespace App\Http\Controllers;

use App\Models\Caso;
use App\Models\Estudiante;
use App\Models\HorarioConsultorio;
use App\Models\Observaciones;
use App\Models\HorarioClase;
use App\Models\SeguimientoCaso;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class EstudianteController extends Controller {

    /**
     * MUESTRA EL FORMULARIO PARA QUE UN ESTUDIANTE PUEDA REALIZAR EL PROCESO DE ASPIRAR A UN CUPO
     * @return FORMULARIO
     */
    function verFormCrearUser() {
        return view('usuarios.estudiante.estudiante_formulario_matricula');
    }

    /**
     * FUNCIÓN QUE CREA EL ESTUDIANTE LO GUARDA COMO ASPIRANTE PARA SER ACEPTADO O NO EN
     * EL CONSULTORIO JURÍDICO
     */
    function crearEstudiante() {
        //DATOS BASICOS
        $codigo = Input::get('codigo');
        $foto = Input::file('foto');
        $nombre = Input::get('nombre');
        $apellidos = Input::get('apellidos');
        $tipo_despacho = Input::get('tipo_despacho');
        $semestre = Input::get('semestre');
        $jornada = Input::get('jornada');
        $periodo_academico = Input::get('periodo_academico');
        $genero = Input::get('genero');
        $fecha_nacimiento = Input::get('fecha_nacimiento');
        $lugar_nacimiento = Input::get('lugar_nacimiento');
        $documento = Input::get('documento');
        $expedida_en = Input::get('expedida_en');
        $direccion_actual = Input::get('direccion_actual');
        $estrato = Input::get('estrato');
        $barrio = Input::get('barrio');
        $telefono = Input::get('telefono');
        $celular = Input::get('celular');
        $funcionario = Input::get('funcionario');
        $correo = Input::get('email');

        //HORARIO
        $horario = Input::get('horario');
        $encuenta = Input::get('encuenta');

        //ANEXOS
        $imagen_cedula = Input::file('imagen_cedula');
        $imagen_carnet = Input::file('imagen_carnet');
        $imagen_contraloria = Input::file('imagen_contraloria');
        $imagen_procuraduria = Input::file('imagen_procuraduria');
        $imagen_ponal = Input::file('imagen_ponal');

        error_log("CODIGO - $codigo/
                   FOTO - $foto/
                   NOMBRE - $nombre/
                   APELLDOS - $apellidos/
                   TIPO_DESPACHO - $tipo_despacho/
                   SEMESTRE - $semestre/
                   JORNADA - $jornada/
                   PERIODO - $periodo_academico/
                   GENERO - $genero/
                   F_NACIMIENTO - $fecha_nacimiento/
                   L_NACIMIENTO - $lugar_nacimiento/
                   DOCUMENTO - $documento/
                   EXPEDIDA_EN - $expedida_en/
                   DIRECCIONAL - $direccion_actual/
                   ESTRATO - $estrato/
                   BARRIO - $barrio/
                   TELEFONO - $telefono/
                   CELULAR - $celular/
                   FUNCIONARIO - $funcionario/
                   CORREO - $correo/
                   HORARIO - " . count($horario) . "/
                   encuenta - $encuenta/
                   cedula - $imagen_cedula/
                   carnet - $imagen_carnet/
                   contra - $imagen_contraloria/
                   procur - $imagen_procuraduria/
                   ponal - $imagen_ponal");

        if (
                !empty($codigo) && !empty($foto) && !empty($nombre) && !empty($apellidos) && !empty($tipo_despacho) &&
                !empty($semestre) && !empty($jornada) && !empty($periodo_academico) && !empty($genero) && !empty($fecha_nacimiento) &&
                !empty($lugar_nacimiento) && !empty($documento) && !empty($expedida_en) && !empty($direccion_actual) && !empty($estrato) && !empty($barrio) && !empty($telefono) && !empty($celular) && !empty($correo) && !empty($funcionario) &&
                count($horario) > 0 && !empty($encuenta) && !empty($imagen_cedula) && !empty($imagen_carnet) && !empty($imagen_contraloria) &&
                !empty($imagen_procuraduria) && !empty($imagen_ponal)
        ) {
            $estudiante = new Estudiante();
            $estudiante->codigo = $codigo;
            $estudiante->nombre = $nombre;
            $estudiante->apellidos = $apellidos;
            $estudiante->tipo_despacho = $tipo_despacho;
            $estudiante->semestre = $semestre;
            $estudiante->jornada = $jornada;
            $estudiante->periodo_academico = $periodo_academico;
            $estudiante->genero = $genero;
            $estudiante->fecha_nacimiento = $fecha_nacimiento;
            $estudiante->lugar_nacimiento = $lugar_nacimiento;
            $estudiante->documento = $documento;
            $estudiante->expedida_en = $expedida_en;
            $estudiante->direccion_actual = $direccion_actual;
            $estudiante->estrato = $estrato;
            $estudiante->barrio = $barrio;
            $estudiante->telefono = $telefono;
            $estudiante->celular = $celular;
            $estudiante->email = $correo;
            $estudiante->encuenta = $encuenta;
            $estudiante->funcionario = $funcionario;
            if ($estudiante->save()) {
                foreach ($horario as $h) {
                    $horario = new HorarioClase();
                    $horario->dia = $h;
                    $horario->estudiante_id = $estudiante->id;
                    $horario->save();
                }
                $estudiante->foto = $this->subir_archivo($foto, $estudiante->id, 'foto');
                $estudiante->imagen_cedula = $this->subir_archivo($imagen_cedula, $estudiante->id, 'imagen_cedula');
                $estudiante->imagen_carnet = $this->subir_archivo($imagen_carnet, $estudiante->id, 'imagen_carnet');
                $estudiante->imagen_contraloria = $this->subir_archivo($imagen_contraloria, $estudiante->id, 'imagen_contraloria');
                $estudiante->imagen_procuraduria = $this->subir_archivo($imagen_procuraduria, $estudiante->id, 'imagen_procuraduria');
                $estudiante->imagen_ponal = $this->subir_archivo($imagen_ponal, $estudiante->id, 'imagen_ponal');
                $estudiante->save();
                return redirect('matricula')->with('mensaje', 'Se ha realizado la matricula exitosamente, se comunicará el resultado al correo electrónico indicado, en su momento.');
            }
            return redirect('matricula')->with();
        }
        return redirect()->back()->with('error', 'Debe llenar todos los campos.');
    }

    /**
     * FUNCIÓN QUE VERIFICA SI YA SE HA REGISTRADO UN CODIGO DEL ESTUDIANTE EN LA BASE DE DATOS
     */
    function verificarCodigo($codigo) {
        if (!empty($codigo)) {
            $estudiante = Estudiante::where('codigo', '=', $codigo)->first();
            if (!empty($estudiante->id)) {
                $tipo = "error";
                $mensaje = "Ya existe un estudiante registrado con ese código.";
            } else {
                $tipo = "ok";
                $mensaje = "El código es válido.";
            }
        } else {
            $tipo = "error";
            $mensaje = "Verifique los datos.";
        }
        return json_encode(array('tipo' => $tipo, 'mensaje' => $mensaje));
    }

    /**
     * FUNCIÓN QUE MUESTRA LOS ASPIRANTES QUE ESTANA REGISTRADOS Y NO SE HAN ACEPTADO O RECHAZADO
     */
    function verAspirantes() {
        if (Auth::check()) {
            if (session('rol') == 'secretaria' || session('rol') == 'director') {
                $estudiantes = Estudiante::where('estado', '=', 'Aspirante')->get();
                return view('usuarios.estudiante.estudiante_ver_aspirantes', ['aspirantes' => $estudiantes]);
            }
            return redirect('/')->with('error', 'No tiene permisos para acceder a esta función.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }

    /**
     * FUNCIÓN QUE MUESTRA LA INFORMACIÓN COMPLETA DE UN ASPIRANTE
     * @param $id -> IDENTIFICADOR DEL ESTUDIANTE
     */
    function verInformacionAspirante($id) {
        if (Auth::check()) {
            if (session('rol') == 'secretaria' || session('rol') == 'director') {
                if (!empty($id)) {
                    $estudiante = Estudiante::FindOrFail($id);
                    //error_log("ESTUDIANTE -< $estudiante->nombre _ ID -< $estudiante->id");
                    $fecha = str_replace("/", "-", $estudiante->fecha_nacimiento);
                    $fecha = date('Y/m/d', strtotime($fecha));
                    $hoy = date('Y/m/d');
                    $edad = $hoy - $fecha;

                    $horario = HorarioClase::where('estudiante_id', '=', $estudiante->id)->get();
                    $observaciones = Observaciones::where('estudiante_id', '=', $estudiante->id)->get();
                    return view('usuarios.estudiante.estudiante_informacion_aspirante', ['estudiante' => $estudiante, 'horario' => json_encode($horario), 'edad' => $edad, 'observaciones' => $observaciones]);
                }
                return redirect('/')->with('error', 'No se reconoce la información solicitada, verifique e intentelo de nuevo.');
            }
            return redirect('/')->with('error', 'No tiene permisos para acceder a esta función.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }

    function verInformacionRechazado($id) {
        if (Auth::check()) {
            if (session('rol') == 'secretaria' || session('rol') == 'director') {
                if (!empty($id)) {
                    $estudiante = Estudiante::FindOrFail($id);
                    //error_log("ESTUDIANTE -< $estudiante->nombre _ ID -< $estudiante->id");
                    $fecha = str_replace("/", "-", $estudiante->fecha_nacimiento);
                    $fecha = date('Y/m/d', strtotime($fecha));
                    $hoy = date('Y/m/d');
                    $edad = $hoy - $fecha;

                    $horario = HorarioClase::where('estudiante_id', '=', $estudiante->id)->get();
                    $observaciones = Observaciones::where('estudiante_id', '=', $estudiante->id)->get();
                    return view('usuarios.estudiante.estudiante_informacion_rechazados', ['estudiante' => $estudiante, 'horario' => json_encode($horario), 'edad' => $edad, 'observaciones' => $observaciones]);
                }
                return redirect('/')->with('error', 'No se reconoce la información solicitada, verifique e intentelo de nuevo.');
            }
            return redirect('/')->with('error', 'No tiene permisos para acceder a esta función.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }

    /**
     * FUNCIÓN QUE MUESTRA LA INFORMACIÓN DE UNESTUDIANTE ACEPTADO
     * @param $id -> IDENTIFICADOR DEL ESTUDIANTE ACEPTADO
     */
    function verInformacionAceptado($id) {
        if (Auth::check()) {
            if (session('rol') == 'secretaria' || session('rol') == 'director' || session('rol') == 'jefe_area') {
                if (!empty($id)) {
                    $estudiante = Estudiante::FindOrFail($id);
                    //error_log("ESTUDIANTE -< $estudiante->nombre _ ID -< $estudiante->id");
                    $fecha = str_replace("/", "-", $estudiante->fecha_nacimiento);
                    $fecha = date('Y/m/d', strtotime($fecha));
                    $hoy = date('Y/m/d');
                    $edad = $hoy - $fecha;

                    $horario = HorarioClase::where('estudiante_id', '=', $estudiante->id)->get();
                    $horario2 = HorarioConsultorio::where('estudiante_id', '=', $estudiante->id)->get();
                    $observaciones = Observaciones::where('estudiante_id', '=', $estudiante->id)->get();
                    $casos = Caso::where('estudiante_id', '=', $id)->get();
                    return view('usuarios.estudiante.estudiante_informacion_aceptados', ['casos' => $casos, 'estudiante' => $estudiante, 'horario' => json_encode($horario), 'horario2' => json_encode($horario2), 'edad' => $edad, 'observaciones' => $observaciones]);
                }
                return redirect('/')->with('error', 'No se reconoce la información solicitada, verifique e intentelo de nuevo.');
            }
            return redirect('/')->with('error', 'No tiene permisos para acceder a esta función.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }

    function verInformacionAceptado2($id) {
        if (Auth::check()) {
            if (session('rol') == 'secretaria' || session('rol') == 'director' || session('rol') == 'jefe_area') {
                if (!empty($id)) {
                    $estudiante = Estudiante::FindOrFail($id);
                    //error_log("ESTUDIANTE -< $estudiante->nombre _ ID -< $estudiante->id");
                    $fecha = str_replace("/", "-", $estudiante->fecha_nacimiento);
                    $fecha = date('Y/m/d', strtotime($fecha));
                    $hoy = date('Y/m/d');
                    $edad = $hoy - $fecha;

                    $horario = HorarioClase::where('estudiante_id', '=', $estudiante->id)->get();
                    $horario2 = HorarioConsultorio::where('estudiante_id', '=', $estudiante->id)->get();
                    $observaciones = Observaciones::where('estudiante_id', '=', $estudiante->id)->get();
                    $casos = Caso::where('estudiante_id', '=', $id)->get();
                    return view('usuarios.estudiante.estudiante_informacion_aceptados_director', ['casos' => $casos, 'estudiante' => $estudiante, 'horario' => json_encode($horario), 'horario2' => json_encode($horario2), 'edad' => $edad, 'observaciones' => $observaciones]);
                }
                return redirect('/')->with('error', 'No se reconoce la información solicitada, verifique e intentelo de nuevo.');
            }
            return redirect('/')->with('error', 'No tiene permisos para acceder a esta función.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }

    /**
     * FUNCION QUE REALIZA EL PROCESO DE POSPONER LA MATRICULA DE UN ASPIRANTE
     */
    function posponerMatricula() {
        if (Auth::check()) {
            if (session('rol') == 'secretaria' || session('rol') == 'director') {
                $observacion = Input::get('obs');
                $id = Input::get('id');
                if (!empty($observacion)) {
                    $observaciones = new Observaciones();
                    $observaciones->observacion = $observacion;
                    $observaciones->estudiante_id = $id;
                    $observaciones->save();
                    return redirect('estudiantes/aspirantes')->with('mensaje', 'Se ha pospuesto el proceso del estudiante.');
                }
            }
            return redirect('/')->with('error', 'No tiene permisos para acceder a esta función.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }

    /**
     * FUNCION QUE RECHAZA EL PROCESO DE MATRICULA DEL ESTUDIANTE
     */
    function rechazarMatricula() {
        if (Auth::check()) {
            if (session('rol') == 'secretaria' || session('rol') == 'director') {
                $observacion = Input::get('obs');
                $id = Input::get('id');
                if (!empty($observacion)) {
                    $observaciones = new Observaciones();
                    $observaciones->observacion = $observacion;
                    $observaciones->estudiante_id = $id;
                    $observaciones->save();
                    $estudiante = Estudiante::FindOrFail($id);
                    $estudiante->estado = "Rechazado";
                    $estudiante->save();
                    return redirect('estudiantes/aspirantes')->with('mensaje', 'Se ha rechazado el proceso del estudiante.');
                }
                return redirect()->back()->with('error', 'Debe llenar las observaciones.');
            }
            return redirect('/')->with('error', 'No tiene permisos para acceder a esta función.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }

    function aceptarMatricula() {
        if (Auth::check()) {
            if (session('rol') == 'secretaria' || session('rol') == 'director') {
                $id = Input::get('id');
                $horario = Input::get('horario');
                error_log("ID " . $id);
                if (!empty($id) && count($horario) > 0) {
                    $estudiante = Estudiante::FindOrFail($id);
                    foreach ($horario as $ho) {
                        $h = new HorarioConsultorio();
                        $h->dia = $ho;
                        $h->estudiante_id = $id;
                        $h->save();
                    }

                    $user = new User();
                    $user->username = $estudiante->codigo;
                    $user->password = md5($estudiante->documento);
                    $user->id_rol = 3;
                    $user->save();
                    $estudiante->estado = "Aceptado";
                    $estudiante->user_id = $user->id;
                    $estudiante->save();
                    return redirect('estudiantes/aspirantes')->with('mensaje', 'Se ha aceptado el estudiante exitosamente.');
                }
                return redirect()->back()->with('error', "Debe seleccionar el horario correctamente.");
            }
            return redirect();
        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }

    /**
     * FUNCIÓN QUE DEVUELVE LOS ESTUDIANTES RECHAZADOS
     */
    function verRechazados() {
        if (Auth::check()) {
            if (session('rol') == 'secretaria' || session('rol') == 'director') {
                $estudiantes = Estudiante::where('estado', '=', 'Rechazado')->get();
                return view('usuarios.estudiante.estudiante_ver_rechazados', ['aspirantes' => $estudiantes]);
            }
            return redirect('/')->with('error', 'No tiene permisos para acceder a esta función.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }

    /**
     * FUNCIÓN QUE DEVUELVE LOS ESTUDIANTES ACEPTADOS
     */
    function verAceptados() {
        if (Auth::check()) {
            if (session('rol') == 'secretaria' || session('rol') == 'director') {
                $estudiantes = Estudiante::where('estado', '=', 'Aceptado')->get();
                return view('usuarios.estudiante.estudiante_ver_aceptados', ['aspirantes' => $estudiantes]);
            }
            return redirect('/')->with('error', 'No tiene permisos para acceder a esta función.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }

    /**
     * Función que sube archivos
     * @param $id ->id del estudiante
     * @param $tipo -> tipo de archivo
     * @param $imagen_principal ->archivo
     */
    private function subir_archivo($imagen_principal, $id, $tipo) {
        $nombre = $imagen_principal->getClientOriginalName();
        $extension = explode('.', $nombre);
        $ruta_disco = public_path() . '/archivos/estudiantes/' . $id;
        $imagen_principal->move($ruta_disco, "{$tipo}_{$id}.{$extension[1]}");
        //error_log("NOMBRE . . - - - " . $ruta_disco . $nombre);
        $ruta = "archivos/estudiantes/$id/{$tipo}_{$id}.{$extension[1]}";
        return $ruta;
    }

    /**
     * FUNCIÓN QUE BUSCA LOS ESTUDIANTES DEL AREA DEL JEFE QUE HA INICIADO SESIÓN
     */
    function estudiantesByArea() {
        if (Auth::check()) {
            if (session('rol') == 'jefe_area') {
                $area = session('area');
                if (!empty($area)) {
                    $estudiantes = Estudiante::where('estado', '=', 'Aceptado')->where('tipo_despacho', '=', $area)->get();
                    return view('usuarios.estudiante.estudiante_ver_aceptados_area', ['aspirantes' => $estudiantes]);
                }
            }
            return redirect('/')->with('error', 'No tiene permisos para acceder a esta función.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }

    /**
     * FUNCIÓN QUE MUESTRA LOS CASOS ASIGNADOS A UN ESTUDIANTE
     */
    function casosEstudianteArea($id) {
        if (Auth::check()) {
            if (session('rol') == 'jefe_area') {
                $area = session('area');
                if (!empty($area) && !empty($id)) {
                    $estudiante = Estudiante::FindOrFail($id);
                    $casos = DB::table('caso_estudiante')
                            ->join('estudiante', 'estudiante.id', '=', 'caso_estudiante.id_estudiante')
                            ->join('caso', 'caso.id', '=', 'caso_estudiante.id_caso')
                            ->join('usuario', 'usuario.id', '=', 'caso.usuario_id')
                            ->where('caso_estudiante.id_estudiante', '=', $id)
                            ->select(
                                    "caso.id as id_caso", "caso.fecha as fecha_caso", "caso.motivo_consulta as motivo", "caso.recomendaciones as recomendaciones", "estudiante.nombre as nombre", "estudiante.apellidos as apellidos", "usuario.documento as documentousuario", "usuario.nombre as nombreusaurio", "usuario.apellidos as apellidosusuario"
                            )
                            ->get();
                    return view('casos.cacsos_estudiante_asignados_area', ['casos' => $casos, 'estudiante' => $estudiante]);
                }
            }
            return redirect('/')->with('error', 'No tiene permisos para acceder a esta función.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }

    /**
     * FUNCION QUE MUESTRA LA INFORMACION DEL SEGUIMIENTO DEL CASO
     */
    function verSeguimientoCasoEstudiante($id_caso, $id_estudiante) {
        if (Auth::check()) {
            if (session('rol') == 'jefe_area') {
                if (!empty($id_caso) && !empty($id_estudiante)) {
                    $caso = Caso::FindOrFail($id_caso);
                    $estudiante = Estudiante::FindOrFail($id_estudiante);
                    $observaciones_caso = SeguimientoCaso::where('id_caso', '=', $id_caso);
                    return view("casos.casos_seguimiento", ['caso' => $caso, 'estudiante' => $estudiante, 'seguimiento' => $observaciones_caso]);
                }
            }
            return redirect('/')->with('error', 'No tiene permisos para acceder a esta función.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }

}
