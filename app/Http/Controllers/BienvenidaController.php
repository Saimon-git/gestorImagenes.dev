<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BienvenidaController extends Controller
{

    public function __construct()
    {
        
        $this->middleware('guest');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('bienvenida');
    }

    public function missingMethod($parameters = array())
    {
        abort(404);
    }
}
