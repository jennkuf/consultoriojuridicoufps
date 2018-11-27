<?php

/**
 * Created by PhpStorm.
 * User: ing.Diegox
 * Date: 23/05/2016
 * Time: 8:31 PM
 */

namespace App\Http\Controllers;

use App\Models\Caso;
use App\Models\CasoEstudiante;
use App\Models\Estudiante;
use App\Models\Rol;
use App\Models\AnexoCaso;
use App\Models\SeguimientoCaso;
use App\User;
use App\Models\JefeArea;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CasoController extends Controller {

    /**
     * CASOS PEDIENTES POR ACEPTAR
     */
    function casosPendientes() {
        if (Auth::check()) {
            if (session('rol') == 'secretaria') {
                $casos = DB::table('caso')
                        ->join('estudiante', 'estudiante.id', '=', 'caso.estudiante_id')
                        ->join('usuario', 'usuario.id', '=', 'caso.usuario_id')
                        ->where('caso.estado', '=', 'nuevo')
                        ->select('caso.id', 'usuario.nombre as nombreusaurio', 'usuario.apellidos as apellidosusuario', 'caso.area', 'estudiante.codigo', 'caso.estado')
                        ->get();
                return view('casos.secreataria_casos_pendientes', ['casos' => $casos]);
            }
            return redirect('/')->with('error', 'No tiene permisos para realizar la acción.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }

    /**
     * RECIBIR UN NUEVO CASO
     */
    function verFormRecibirCaso() {
        if (Auth::check()) {
            if (session('rol') == 'secretaria' || session('rol') == "estudiante") {
                return view('casos.secretaria_form_recibir_nuevo');
            }
            return redirect('/')->with('error', 'No tiene permisos para realizar la acción.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }

    /**
     * GUARDA UN NUEVO CASO EN LA BD
     */
    function nuevoCaso() {
        if (Auth::check()) {
            if (session('rol') == 'estudiante') {
                //USUARIO
                $nombre = Input::get('nombre');
                $apellidos = Input::get('apellidos');
                $documento = Input::get('documento');
                $genero = Input::get('genero');
                $fecha_nacimiento = Input::get('fecha_nacimiento');
                $lugar_nacimiento = Input::get('lugar_nacimiento');
                $discapacidad = Input::get('discapacidad');
                $vulnerabilidad = Input::get('vulnerabilidad');
                $direccion_actual = Input::get('direccion_actual');
                $estrato = Input::get('estrato');
                $barrio = Input::get('barrio');
                $ciudad = Input::get('ciudad');
                $telefono = Input::get('telefono');
                $celular = Input::get('celular');
                $email = Input::get('email');

                //ESTUDIANTE
                $user = Auth::user();
                //$estudiante = Estudiante::where('id', '=', $user->id)->first();
                //$codigo_estudiante = Input::get('codigo_estudiante');
                //DATOS DEL CASO
                $tipo_despacho = Input::get('tipo_despacho');
                $motivo = Input::get('motivo');
                $recomendaciones = Input::get('recomendaciones');
                //if(valido todos los campos){
                //Busco el estudiante
                $estudiante = Estudiante::where('user_id', '=', $user->id)->first();
                //Creo el usuario
                $usuario = new Usuario();
                $usuario->nombre = $nombre;
                $usuario->apellidos = $apellidos;
                $usuario->documento = $documento;
                $usuario->genero = $genero;
                $usuario->fecha_nacimiento = $fecha_nacimiento;
                $usuario->lugar_nacimiento = $lugar_nacimiento;
                $usuario->discapacidad = $discapacidad;
                $usuario->vulnerabilidad = $vulnerabilidad;
                $usuario->direccion_actual = $direccion_actual;
                $usuario->estrato = $estrato;
                $usuario->barrio = $barrio;
                $usuario->ciudad = $ciudad;
                $usuario->telefono = $telefono;
                $usuario->celular = $celular;
                $usuario->email = $email;
                $usuario->save();

                $us = new User();
                $us->username = $documento;
                $us->password = md5($documento);
                $us->id_rol = 5;
                $us->save();
                $usuario->user_id = $us->id;
                $usuario->save();

                //Creo el caso
                $caso = new Caso();
                $caso->fecha = date("Y-m-d H:i:s");
                $caso->area = $tipo_despacho;
                $caso->usuario_id = $usuario->id;
                $caso->estudiante_id = $estudiante->id;
                $caso->motivo_consulta = $motivo;
                $caso->recomendaciones = $recomendaciones;
                $caso->estado = 'nuevo';
                $caso->save();
                return redirect('estudinate/casos/asignados')->with('mensaje', 'El caso se ha registrado exitosamente');
                //}
            }
            return redirect('/')->with('error', 'No tiene permisos para realizar la acción.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }

    function casosAreaPendientes() {
        if (Auth::check()) {
            if (session('rol') == 'jefe_area') {
                $area = session('area');
                if (!empty($area)) {
                    $casos = DB::table('caso')
                            ->join('estudiante', 'estudiante.id', '=', 'caso.estudiante_id')
                            ->join('usuario', 'usuario.id', '=', 'caso.usuario_id')
                            ->where('caso.area', '=', $area)
                            ->select(
                                    'caso.id', 'usuario.nombre as nombreusaurio', 'usuario.documento as documentousuario', 'usuario.apellidos as apellidosusuario', 'caso.area', 'estudiante.codigo', 'caso.estado', 'caso.motivo_consulta', 'caso.fecha', 'caso.recomendaciones'
                            )
                            ->get();
                    $estudiantes = Estudiante::where('estado', '=', 'Aceptado')->where('tipo_despacho', '=', $area)->get();
                    return view('casos.casos_por_area_pendientes', ['casos' => $casos, 'estudiantes' => $estudiantes]);
                }
            }
            return redirect('/')->with('error', 'No tiene permisos para acceder a esta función.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }

    function asignarEstudianteCaso() {
        if (Auth::check()) {
            if (session('rol') == 'jefe_area') {
                $id_caso = Input::get('id_caso');
                $id_estudiante = Input::get('estudiante');
                if (!empty($id_estudiante) && !empty($id_caso)) {
                    $estudiante = Estudiante::FindOrFail($id_estudiante);
                    $caso = Caso::FindOrFail($id_caso);
                    $caso_estudiante = new CasoEstudiante();
                    $caso_estudiante->id_estudiante = $id_estudiante;
                    $caso_estudiante->id_caso = $id_caso;
                    $caso_estudiante->save();
                    $caso->estado = "Asignado";
                    $caso->save();
                    return redirect()->back()->with('mensaje', 'Se ha asignado al caso.');
                }
                return redirect()->back()->with('error', 'No se reconoce la información inidicada.');
            }
            return redirect('/')->with('error', 'No tiene permisos para acceder a esta función.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }

    function casosAsignadosEstudiante() {
        if (Auth::check()) {
            $user = Auth::user();
            $estudiante = Estudiante::where('user_id', '=', $user->id)->first();
            $casos = DB::table('caso_estudiante')
                    ->join('estudiante', 'caso_estudiante.id_estudiante', '=', 'estudiante.id')
                    ->join('caso', 'caso_estudiante.id_caso', '=', 'caso.id')
                    ->join('usuario', 'usuario.id', '=', 'caso.usuario_id')
                    ->select(
                            "caso.id as id", "caso.area", "estudiante.codigo", "caso.estado", 'caso.motivo_consulta', 'caso.fecha', 'caso.recomendaciones', 'usuario.nombre as nombreusaurio', 'usuario.documento as documentousuario', 'usuario.apellidos as apellidosusuario'
                    )
                    ->where('caso_estudiante.id_estudiante', '=', $estudiante->id)
                    ->get();

            return view('usuarios.estudiante.estudiante_ver_casos_asignados', ['casos' => $casos]);
        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }

    function seguimiento() {
        $user = Auth::user();
        $id_caso = Input::get('id_caso');
        $relacion = Input::get('relacion');
        $descripcion = Input::get('descripcion');
        $archivo = Input::file('adjuntocaso');
        if (!empty($id_caso)) {
            $seguimiento = new SeguimientoCaso();
            $seguimiento->id_estudiante = $user->id;
            $seguimiento->id_caso = $id_caso;
            $seguimiento->relacion = $relacion;
            $seguimiento->descripcion = $descripcion;
            if ($archivo) {
                $seguimiento->anexo = $this->subir_archivo($archivo, $id_caso, $relacion);
            }
            $seguimiento->save();
            return redirect()->back()->with("mensaje", 'Se ha registrado.');
        }
        return redirect()->back()->with("error", 'Ha ocurrido un error.');
    }

    function reporteCasos() {
        if (Auth::check()) {
            if (session('rol') == 'director') {
                $casos2 = DB::table('caso')
                        ->join('estudiante', 'estudiante.id', '=', 'caso.estudiante_id')
                        ->select(
                                'caso.id as id_caso', 'caso.area as area_caso', 'caso.fecha as fecha_caso', 'caso.motivo_consulta as motivo_consulta', 'caso.recomendaciones as recomendaciones', 'caso.estado as estado_caso', 'estudiante.codigo as codigo'
                        )
                        ->get();
                $civil = 0;
                $familia = 0;
                $administrativo = 0;
                $laboral = 0;
                $penal = 0;
                $nuevo = 0;
                $asignado = 0;
                $rechazado = 0;
                foreach ($casos2 as $c) {
                    switch ($c->area_caso) {
                        case "CIVIL":
                            $civil++;
                            break;
                        case "ADMINISTRATIVO":
                            $administrativo++;
                            break;
                        case "LABORAL":
                            $laboral++;
                            break;
                        case "PENAL":
                            $penal++;
                            break;
                        case "FAMILIA":
                            $familia++;
                            break;
                    }
                    switch ($c->estado_caso) {
                        case "nuevo":
                            $nuevo++;
                            break;
                        case "Asignado":
                            $asignado++;
                            break;
                        case "Rechazado":
                            $rechazado++;
                    }
                }
                return view('casos.reporte_casos', [
                    'casos' => $casos2, 'civil' => $civil, 'administrativo' => $administrativo, 'laboral' => $laboral,
                    'penal' => $penal, 'familia' => $familia, 'nuevo' => $nuevo, 'asignado' => $asignado,
                    'rechazado' => $rechazado
                ]);
            }
            return redirect('/')->with('error', 'No tiene permisos para acceder a esta función.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }

    function casos_area($area) {
        if ($area != "TODOS") {
            $casos = Caso::where('area', '=', $area)->get();
        } else {
            $casos = Caso::all();
        }
        if (count($casos) > 0) {
            $msj = "<div class='panel panel-default'>";
            $msj .= "<div class='panel-heading'>";
            $msj .= "<h3 class='panel-title'>Listado de casos</h3>";
            $msj .= "<button class='btn btn-default' onclick='window.print();'><i class='fa fa-cloud-download'></i> Pdf</button>";
            $msj .= "</div><table class='table table-bordered'>";
            $msj .= "<thead>";
            $msj .= "<tr>";
            $msj .= "<th>ID</th>
                     <th>FECHA</th>
                     <th>MOTIVO</th>
                     <th>RECOMENDACIONES</th>
                     <th>AREA</th>
                     <th>ESTADO</th>
                     <th>CODIGO ESTUDIANTE</th>";
            $msj .= "</tr>";
            $msj .= "</thead>";
            $msj .= "<tbody>";
            foreach ($casos as $c) {
                $est = Estudiante::FindOrFail($c->estudiante_id);
                $msj .= "<tr>";
                $msj .= "<td>$c->id</td>";
                $msj .= "<td>$c->fecha</td>";
                $msj .= "<td>$c->motivo_consulta</td>";
                $msj .= "<td>$c->recomendaciones</td>";
                $msj .= "<td>$c->area</td>";
                $msj .= "<td>$c->estado</td>";
                $msj .= "<td>$est->codigo</td>";
                $msj .= "</tr>";
            }
            $msj .= "</tbody>";
            $msj .= "</table></div>";
            return $msj;
        }
        return "No existen casos en el área {$area}";
    }

    function casos_estado($area) {
        if ($area != "TODOS") {
            $casos = Caso::where('estado', '=', $area)->where('area', '=', session('area'))->get();
        } else {
            $casos = Caso::where('area', '=', session('area'))->get();
        }
        if (count($casos) > 0) {
            $msj = "<div class='panel panel-default'>";
            $msj .= "<div class='panel-heading'>";
            $msj .= "<h3 class='panel-title'>Listado de casos</h3>";
            $msj .= "<button class='btn btn-default' onclick='window.print();'><i class='fa fa-cloud-download'></i> Pdf</button>";
            $msj .= "</div><table class='table table-bordered'>";
            $msj .= "<thead>";
            $msj .= "<tr>";
            $msj .= "<th>ID</th>
                     <th>FECHA</th>
                     <th>MOTIVO</th>
                     <th>RECOMENDACIONES</th>
                     <th>AREA</th>
                     <th>ESTADO</th>
                     <th>CODIGO ESTUDIANTE</th>";
            $msj .= "</tr>";
            $msj .= "</thead>";
            $msj .= "<tbody>";
            foreach ($casos as $c) {
                $est = Estudiante::FindOrFail($c->estudiante_id);
                $msj .= "<tr>";
                $msj .= "<td>$c->id</td>";
                $msj .= "<td>$c->fecha</td>";
                $msj .= "<td>$c->motivo_consulta</td>";
                $msj .= "<td>$c->recomendaciones</td>";
                $msj .= "<td>$c->area</td>";
                $msj .= "<td>$c->estado</td>";
                $msj .= "<td>$est->codigo</td>";
                $msj .= "</tr>";
            }
            $msj .= "</tbody>";
            $msj .= "</table></div>";
            return $msj;
        }
        return "No existen casos con estado {$area}";
    }

    function casos_estudiante($codigo) {
        if ($codigo == "TODOS") {
            $casos = Caso::all();
        } else {
            $estudiante = Estudiante::where('codigo', '=', $codigo)->first();
            $casos = Caso::where('estudiante_id', '=', $estudiante->id)->get();
        }
        if (count($casos) > 0) {
            $msj = "<div class='panel panel-default'>";
            $msj .= "<div class='panel-heading'>";
            $msj .= "<h3 class='panel-title'>Listado de casos</h3>";
            $msj .= "<button class='btn btn-default' onclick='window.print();'><i class='fa fa-cloud-download'></i> Pdf</button>";
            $msj .= "</div><table class='table table-bordered'>";
            $msj .= "<thead>";
            $msj .= "<tr>";
            $msj .= "<th>ID</th>
                     <th>FECHA</th>
                     <th>MOTIVO</th>
                     <th>RECOMENDACIONES</th>
                     <th>AREA</th>
                     <th>ESTADO</th>
                     <th>CODIGO ESTUDIANTE</th>";
            $msj .= "</tr>";
            $msj .= "</thead>";
            $msj .= "<tbody>";
            foreach ($casos as $c) {
                $est = Estudiante::FindOrFail($c->estudiante_id);
                $msj .= "<tr>";
                $msj .= "<td>$c->id</td>";
                $msj .= "<td>$c->fecha</td>";
                $msj .= "<td>$c->motivo_consulta</td>";
                $msj .= "<td>$c->recomendaciones</td>";
                $msj .= "<td>$c->area</td>";
                $msj .= "<td>$c->estado</td>";
                $msj .= "<td>$est->codigo</td>";
                $msj .= "</tr>";
            }
            $msj .= "</tbody>";
            $msj .= "</table></div>";
            return $msj;
        }
        return "No existen casos con el estudiante de código {$codigo}";
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
        $ruta_disco = public_path() . '/archivos/casos/' . $id;
        $imagen_principal->move($ruta_disco, "{$tipo}_{$id}.{$extension[1]}");
        //error_log("NOMBRE . . - - - " . $ruta_disco . $nombre);
        $ruta = "archivos/casos/$id/{$tipo}_{$id}.{$extension[1]}";
        return $ruta;
    }

    function verseguimietno($id) {
        $seguimiento = SeguimientoCaso::where('id_caso', '=', $id)->get();
        return json_encode($seguimiento);
    }

    function reporteJefeArea() {
        $area = session('area');
        $casos2 = DB::table('caso')
                ->join('estudiante', 'estudiante.id', '=', 'caso.estudiante_id')
                ->select(
                        'caso.id as id_caso', 'caso.area as area_caso', 'caso.fecha as fecha_caso', 'caso.motivo_consulta as motivo_consulta', 'caso.recomendaciones as recomendaciones', 'caso.estado as estado_caso', 'estudiante.codigo as codigo'
                )
                ->where('area', 'LIKE', $area)
                ->get();

        return view('casos.jefe_area_reporte_casos', [
            'casos' => $casos2, 'area' => $area
        ]);
    }

    function miscasos() {
        $user = Auth::user();
        $usuario = Usuario::where('user_id', '=', $user->id)->first();
        $casos = DB::table('caso')
                ->join('estudiante', 'estudiante.id', '=', 'caso.estudiante_id')
                ->join('usuario', 'usuario.id', '=', 'caso.usuario_id')
                ->where('usuario.id', '=', $usuario->id)
                ->select(
                        "caso.id as id_caso", 
                        "caso.area as area", 
                        "caso.fecha as fecha_caso", 
                        "caso.motivo_consulta as motivo", 
                        "caso.recomendaciones as recomendaciones", 
                        "caso.recomendaciones as estado", 
                        "estudiante.nombre as nombre", 
                        "estudiante.apellidos as apellidos", 
                        "estudiante.foto as foto", 
                        "usuario.documento as documentousuario", 
                        "usuario.nombre as nombreusaurio", 
                        "usuario.apellidos as apellidosusuario",
                        "usuario.genero as genero"
                )
                ->get();
        return view('casos.miscasos', ['miscasos' => $casos]);
    }

}
