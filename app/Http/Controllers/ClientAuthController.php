<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientAuthController extends Controller
{
    public function login(){
        return view('cliente.login');
    }

    public function handleLogin(Request $request){
        $request->validate([
            'correo' => ['email', 'filled'],
            'password' => ['filled'],
        ]);

        if(Auth::guard('client')->attempt($request->only(['correo', 'password'])))
        {
            return redirect('/cliente');
        }
        return redirect()->back()->withErrors(['Err:', ' Credenciales invalidas']);
    }
}
