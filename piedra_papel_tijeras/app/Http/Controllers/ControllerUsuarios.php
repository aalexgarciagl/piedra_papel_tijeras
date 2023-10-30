<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ControllerUsuarios extends Controller
{
    function getUsers(){
        $usuarios = Usuarios::all(); 
        return response()->json($usuarios); 
    }

    function getUser($id){
        $usuario = Usuarios::find($id); 
        return response()->json($usuario); 
    }

    function setUser(Request $request){
        $newUser = new Usuarios(); 
        $newUser ->nombre = $request->get("nombre"); 
        $newUser ->password = Hash::make($request->password); 
        $newUser ->partidas_jugadas = 0; 
        $newUser ->partidas_ganadas = 0;     
        $newUser ->rol = 0;
        $newUser->save();   
    }

    function deleteUser($id){
        $usuario = Usuarios::find($id);
        $usuario->delete();         
    }

    function updateUser($id, Request $request){
        $usuario = Usuarios::find($id); 
        $usuario->nombre = $request->nombre;
        $usuario->password = Hash::make($request->password);
        $usuario->partidas_jugadas = $request->partidas_jugadas; 
        $usuario->partidas_ganadas = $request->partidas_ganadas;   
        $usuario->rol = $request->rol; 
        $usuario->save();       
    }
}
