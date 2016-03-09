<?php

namespace App\Http\Controllers;


class InicioController extends Controller
{

    public function __construct()
    {
        
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('inicio');
    }

    public function missingMethod($parameters = array())
    {
        abort(404);
    }

 
}
