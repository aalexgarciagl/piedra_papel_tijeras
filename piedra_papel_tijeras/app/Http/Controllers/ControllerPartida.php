<?php

namespace App\Http\Controllers;

use App\Models\Partidas;
use Illuminate\Http\Request;

class ControllerPartida extends Controller
{
    function getPartida($id){
        $partida = Partidas::find($id);
        return response()->json($partida); 
    }
}
