<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

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
}
