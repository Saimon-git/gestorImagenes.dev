<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\CrearAlbumRequest;
//use App\Http\Requests\ActualizarAlbumRequest;
//use App\Http\Requests\EliminarAlbumRequest;

use App\Album;

class AlbumController extends Controller
{

    public function __construct()
    {
        
        $this->middleware('auth');
    }

    public function getIndex()
    {
        $usuario = Auth::user();

        $albumes = $usuario->albumes;

        return view('albumes.mostrar',['albumes' => $albumes]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCrearAlbum()
    {
        return view('albumes.crear-album');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCrearAlbum(CrearAlbumRequest $request)
    {
        $usuario = Auth::user();

        Album::create
        (
            [
                'nombre' => $request->get('nombre'),
                'descripcion' => $request->get('descripcion'),
                'usuario_id' => $usuario->id
            ]
        );
        return redirect('/validado/albumes')->with('creado','El album ha sido creado');
    }

    public function getActualizarAlbum()
    {
        return 'form actualizacion de Album';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postActualizarAlbum()
    {
        return 'actualizando Album';
    }

    public function getEliminarAlbum()
    {
        return 'form eliminacion de Album';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postEliminarAlbum()
    {
        return 'eliminar Album';
    }

    public function missingMethod($parameters = array())
    {
        abort(404);
    }
   
}
