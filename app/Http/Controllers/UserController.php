<?php
/**
 * Created by PhpStorm.
 * User: ing.Diegox
 * Date: 27/04/2016
 * Time: 8:53 PM
 */
namespace App\Http\Controllers;


use App\Models\Estudiante;
use App\Models\JefeArea;
use App\Models\Rol;
use App\Models\Usuario;
use \App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Función que verifica la información del formulario de inicio de sesión
     * @return \Illuminate\Http\RedirectResponse redirecciona a la vista indicada de pendiendo si se logra o no iniciar sesión
     */
    function inicio_sesion()
    {
        $email = Input::get('email');
        $pass = Input::get("pass");
        if (!empty($email) && !empty($pass)) {
            //$p = Hash::make($pass);
            $p = md5($pass);
            $user = User::where('username', '=', $email)->where('password', 'like', $p)->first();
            if (!empty($user->id)) {
                Auth::loginUsingId($user->id);
                Session::put('userid', $user->id);
                Session::put('name', $user->username);
                $rol = DB::table('rol')
                    ->join('users', 'users.id_rol', '=', 'rol.id')
                    ->where('users.id', '=', $user->id)->first();
                Session::put('rol', $rol->nombre);
                if ($rol->nombre == "jefe_area") {
                    $j = JefeArea::where('user_id', '=', $user->id)->first();
                    Session::put('area', $j->area);
                }
                if($rol->nombre == "estudiante"){
                    $j = Estudiante::where('user_id', '=', $user->id)->first();
                    Session::put('foto', $j->foto);
                }
                return redirect('/')->with('mensaje', 'Se ha iniciado sesión.');
            } else {
                return redirect('/')->with('error', 'Los datos no coinciden.');
            }
        }
        return redirect('/')->with('error', 'No se ha podido iniciar sesión, verifique e intentelo de nuevo.');
    }

    function logout()
    {
        Auth::logout();
        return redirect('/')->with('mensaje', 'Ha cerrado sesión.');
    }

    function estudiantes()
    {
        if (Auth::check()) {
            $usuarios = Estudiante::all();
            return view('usuarios.estudiantes', ['usuarios' => $usuarios]);
        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }


    function eliminar()
    {
        if (Auth::check()) {
            $id = Input::get('id');
            if (!empty($id)) {
                $user = usuario::FindOrFail($id);
                $usuario = user::where('usuario_id', '=', $user->id)->first();
                if ($user->delete()) {
                    $usuario->delete();
                    return redirect('usuarios')->with("mensaje", "Se ha eliminado el usuario correctamente.");
                } else {
                    return redirect('/')->with("error", "Ha ocurrido un error interno, verifique e intentelo de nuevo.");
                }
            } else {
                return redirect('/')->with("error", "No se reconoce la información del usuario que se desea eliminar, por favor verifique e intentelo de nuevo.");
            }

        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }

    function verFormEditUser($id)
    {
        if (Auth::check()) {

            if (!empty($id)) {
                $user = DB::table('usuario')
                    ->Join('users', 'usuario.id', '=', 'users.usuario_id')
                    ->where('usuario.id', '=', $id)
                    ->select('users.id', 'usuario.id as id_usuario', 'usuario.cedula', 'users.email', 'users.username', 'usuario.nombre', 'usuario.fecha_nacimiento', 'usuario.ciudad_expedicion_cedula')
                    ->first();
                return view('usuarios.administrador_editar_usuario', ['usuario' => $user]);
            }
            return redirect('usuarios')->with('error', 'No se reconoce la información del usuario solicitado, por favor verifique e intentelo de nuevo.');

        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }

    function editarUsuario()
    {
        if (Auth::check()) {

        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }

    function inicio()
    {
        if (Auth::check()) {
            return view('inicio_pendientes');
        }
        return view('welcome');
    }

    function buscar_estudiante_asignar($codigo)
    {
        if (Auth::check()) {
            if (!empty($codigo)) {
                $estudiante = Estudiante::where('codigo', '=', $codigo)->where('estado', '=', 'Aceptado')->first();
                return json_encode(array('estado' => 'ok', 'estudiante' => $estudiante));
            }
        }
        return json_encode(array('estado' => 'fail'));
    }

    function buscarUsuario($documento)
    {
        if (Auth::check()) {
            if (!empty($documento)) {

                $usuario = Usuario::where('documento', '=', $documento)->first();
                return json_encode(array('estado' => 'ok', 'usuario' => $usuario));
            }
        }
        return json_encode(array('estado' => 'fail'));
    }

}
