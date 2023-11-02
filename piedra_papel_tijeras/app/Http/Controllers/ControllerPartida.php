<?php

namespace App\Http\Controllers;

use App\Models\Partidas;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class ControllerPartida extends Controller
{
    function getPartida($id){
        $partida = Partidas::find($id);
        return response()->json($partida); 
    }
    
    
    function showRanking(){
        $usuarios = Usuarios::select('id', 'nombre', 'partidas_jugadas', 'partidas_ganadas')
        ->orderBy('partidas_ganadas', 'desc')
        ->get();
        return response()->json($usuarios);  
    }

    function tirada(Request $request){
        $partida = $request->idPartida; 
    }

    //Crear midleware para comprobar que los dos usuarios estan en la base de datos. 
    //Comprobar que ninguno de los usuarios tenga otra partida abierta. 
    function crearPartida(Request $request){       
        $partida = new Partidas();
        $partida -> id_jugador = $request->id1;
        $partida -> id_jugador2 = $request->id2;          
        $partida -> save(); 
        return response()->json("Partida creada");
    }
}
