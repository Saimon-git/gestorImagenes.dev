<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditarPerfilRequest;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEditarPerfil()
    {
        return view('usuario.actualizar');
    }

    public function postEditarPerfil(EditarPerfilRequest $request)
    {
        $usuario = Auth::user();
        $nombre = $request->get('nombre');

        $usuario->nombre = $nombre;
        if ($request->has('password')) 
        {
            $usuario->password = bcrypt($request->get('password'));
        }

        if ($request->has('pregunta')) 
        {
            $usuario->pregunta = $request->get('pregunta');
            $usuario->respuesta = $request->get('respuesta');
        }

        $usuario->save();
        return redirect('/validado')->with('actualizado', 'Su perfil ha sido Actualizado!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function missingMethod($parameters = array())
    {
        abort(404);
    }
}
