<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    private $reglasValidacion = [
        'email' => ['required'],
        'password' => ['required']
    ];

    public function validar(Request $request){
        $request->validate($this->reglasValidacion);
        $empleadoAux = DB::select('SELECT * FROM empleados WHERE correo = :email AND password = :password', ['email'=>$request->email, 'password' => $request->password]);
        if($empleadoAux[0]->id_tipoUsuario < 4 && $empleadoAux[0]->id_tipoUsuario > 0){
            $empleado = $empleadoAux[0];
            return redirect('/empleado')->with('empleado',$empleado);
        }
    }
}