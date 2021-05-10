<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComercioController extends Controller
{
    //

    public function index(){

        return view('comercio.index');

    }

    public function facturacion(){

        return view('comercio.facturacion');

    }

    public function remitos(){

        return view('comercio.remitos');

    }


}
