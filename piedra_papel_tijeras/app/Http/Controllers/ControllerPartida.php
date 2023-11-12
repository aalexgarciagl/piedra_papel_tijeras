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
/**
 * 0 -> Piedra
 * 1 -> Papel
 * 2 -> Tijera
 * Si lo hacemos con numeros evitamos problemas de sintaxis. 
 * */ 
    function tirada(Request $request){
        $partida = Partidas::find($request->idPartida); 
        $jugador1Tirada = $request->tirada1;
        $jugador2Tirada = $request->tirada2; 
        $vicJ1 = 0;
        $vicJ2 = 0;

        // Lógica para determinar el ganador de cada tirada
        if($jugador1Tirada == 0 && $jugador2Tirada == 1){
            $vicJ2++;
        }
        elseif($jugador1Tirada == 0 && $jugador2Tirada == 2){
            $vicJ1++;
        }
        elseif($jugador1Tirada == 1 && $jugador2Tirada == 0){
            $vicJ1++;
        }
        elseif($jugador1Tirada == 1 && $jugador2Tirada == 2){
            $vicJ2++;
        }
        elseif($jugador1Tirada == 2 && $jugador2Tirada == 0){
            $vicJ2++;
        }
        elseif($jugador1Tirada == 2 && $jugador2Tirada == 1){
            $vicJ1++;
        }

        // Verificar victoria después de cada tirada
        if($vicJ1 == 5 || $vicJ2 == 5){
            if($vicJ1 == 5){
                $partida -> ganador = $partida->id_jugador;
                return response()->json(['ganador' => $partida->id_jugador]);
            }else{
                $partida -> ganador = $partida->id_jugador2;
                return response()->json(['ganador' => $partida->id_jugador2]);
            }
            
            
        }

        // Si no hay ganador aún, puedes retornar un mensaje indicando que la tirada fue procesada
        return response()->json(['mensaje' => 'Tirada procesada, sigue jugando']);
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
