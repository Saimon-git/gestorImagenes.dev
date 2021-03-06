<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MostrarFotosRequest;
use App\Http\Requests\CrearFotoRequest;
use App\Album;
use App\Foto;
use Carbon\Carbon;

class FotoController extends Controller
{

    public function __construct()
    {
        
        $this->middleware('auth');
    }

    public function getIndex(MostrarFotosRequest $request)
    {
        $id = $request->get('id');

        $fotos = Album::find($id)->fotos;

        return view('fotos.mostrar', ['fotos' =>$fotos, 'id' => $id]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCrearFoto(Request $request)
    {
        $id = $request->get('id');
        return view('fotos.crear-foto',['id' =>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCrearFoto(CrearFotoRequest $request)
    {
        $id = $request->get('id');
        $imagen = $request->file('imagen');

        $ruta = '/img/';
        $nombre = sha1(Carbon::now()).$imagen->guessExtension();
        $imagen->move(getcwd().$ruta , $nombre);
        Foto::create
        (
            [
                'nombre' => $request->get('nombre'),
                'descripcion'=> $request->get('descripcion'),
                'ruta' => $ruta.$nombre,
                'album_id' => $id
            ]
        );
        
        return redirect("/validado/fotos?id={{$id}}")->with('creada', 'La foto ha sido subida');
    }

    public function getActualizarFoto()
    {
        return 'form actualizacion de foto';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postActualizarFoto()
    {
        return 'actualizando foto';
    }

    public function getEliminarFoto()
    {
        return 'form eliminacion de foto';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postEliminarFoto()
    {
        return 'eliminar foto';
    }

   public function missingMethod($parameters = array())
   {
       abort(404);
   }
}
