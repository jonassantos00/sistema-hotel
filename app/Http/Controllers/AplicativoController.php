<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AplicativoController extends Controller
{
    
    public function recebeDados(Request $request){
        // return $request->all();
        return "Dados Recebidos: ".dd($request->all());
    }

}
