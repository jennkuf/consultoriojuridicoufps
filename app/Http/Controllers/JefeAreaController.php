<?php

/**
 * Created by PhpStorm.
 * User: ing.Diegox
 * Date: 23/05/2016
 * Time: 2:11 PM
 */

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Rol;
use App\User;
use App\Models\JefeArea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class JefeAreaController extends Controller {

    /**
     * LISTADO DE JEFES DE AREA
     */
    function jefesArea() {
        if (Auth::check()) {
            if (session('rol') == 'secretaria' || session('rol') == 'director') {
                $jefes = JefeArea::all();
                return view('usuarios.jefe_area.admin_jefe_area', ['jefes' => $jefes]);
            }
            return redirect('/')->with('error', 'No tiene permisos para realizar la acción.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    function jefesAreaSinAceptar() {
        if (Auth::check()) {
            if (session('rol') == 'secretaria' || session('rol') == 'director') {
                $jefes = JefeArea::where('estado', '=', 'pendiente')->get();
                return view('usuarios.jefe_area.admin_jefe_area', ['jefes' => $jefes]);
            }
            return redirect('/')->with('error', 'No tiene permisos para realizar la acción.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    function jefesAreaAceptados() {
        if (Auth::check()) {
            if (session('rol') == 'secretaria' || session('rol') == 'director') {
                $jefes = JefeArea::where('estado', '=', 'aceptado')->get();
                return view('usuarios.jefe_area.admin_jefe_area', ['jefes' => $jefes]);
            }
            return redirect('/')->with('error', 'No tiene permisos para realizar la acción.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    function jefesAreaRechazado() {
        if (Auth::check()) {
            if (session('rol') == 'secretaria' || session('rol') == 'director') {
                $jefes = JefeArea::where('estado', '=', 'rechazado')->get();
                return view('usuarios.jefe_area.admin_jefe_area', ['jefes' => $jefes]);
            }
            return redirect('/')->with('error', 'No tiene permisos para realizar la acción.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    function jefesEstado($id, $estado) {
        if (Auth::check()) {
            if (session('rol') == 'secretaria' || session('rol') == 'director') {
                if ($id && $estado) {
                    $jefe = JefeArea::findOrFail($id);
                    $jefe->estado = $estado;
                    $jefe->save();
                    return redirect()->back()->with('mensaje', 'Se ha realizado el proceso correctamente.');
                }
                return redirect()->back()->whith('error', 'No se puede encontrar la información necesaria para realizar el proceso, por favor verifique e intentelo de nuevo.');
            }
            return redirect('/')->with('error', 'No tiene permisos para realizar la acción.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }
    
    

    /**
     * FORMULARIO PARA CREAR UN JEFE DE AREA
     */
    function formCrearJefeArea() {
        if (Auth::check()) {
            if (session('rol') == 'secretaria' || session('rol') == 'director') {
                return view('usuarios.jefe_area.admin_jefe_area_form_crear');
            }
            return redirect('/')->with('error', 'No tiene permisos para realizar la acción.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    /**
     * GUARDAR UN NUEVO JEFE DE AREA
     */
    function crearJefe() {
        if (Auth::check()) {
            if (session('rol') == 'secretaria' || session('rol') == 'director') {
                $nombre = Input::get('nombre');
                $apellidos = Input::get('apellidos');
                $email = Input::get('email');
                $documento = Input::get('documento');
                $ciudad_expedicion = Input::get('ciudad_expedicion');
                $fecha_nacimiento = Input::get('fecha_nacimiento');
                $telefono = Input::get('telefono');
                $direccion = Input::get('direccion');
                $barrio = Input::get('barrio');
                $ciudad = Input::get('ciudad');
                $genero = Input::get('genero');
                $codigo = Input::get('codigo');
                $area = Input::get('area');
                if (
                        !empty($nombre) && !empty($apellidos) && !empty($email) && !empty($documento) && !empty($ciudad_expedicion) &&
                        !empty($fecha_nacimiento) && !empty($telefono) && !empty($direccion) && !empty($barrio) && !empty($ciudad) &&
                        !empty($genero) && !empty($codigo) && !empty($area)
                ) {
                    $user = new User();
                    $user->username = $codigo;
                    $user->password = md5($documento);
                    $user->id_rol = 2;
                    $user->save();
                    $jefe = new JefeArea();
                    $jefe->nombre = $nombre;
                    $jefe->apellidos = $apellidos;
                    $jefe->email = $email;
                    $jefe->documento = $documento;
                    $jefe->ciudad_expedicion = $ciudad_expedicion;
                    $jefe->fecha_nacimiento = $fecha_nacimiento;
                    $jefe->telefono = $telefono;
                    $jefe->direccion = $direccion;
                    $jefe->barrio = $barrio;
                    $jefe->ciudad = $ciudad;
                    $jefe->genero = $genero;
                    $jefe->codigo = $codigo;
                    $jefe->area = $area;
                    $jefe->estado='pendiente';
                    $jefe->user_id = $user->id;
                    $jefe->save();
                    return redirect()->back()->with('mensaje', 'Se ha registrado un nuevo jefe exitosamente');
                }
                return redirect()->back()->with('error', 'Debe diligenciar todos los datos.');
            }
            return redirect('/')->with('error', 'No tiene permisos para realizar la acción.');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

}
