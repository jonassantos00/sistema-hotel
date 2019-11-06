<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AplicativoController extends Controller
{
    
    public function recebeDados(Request $request){
        dd($request->all());
    }

}
