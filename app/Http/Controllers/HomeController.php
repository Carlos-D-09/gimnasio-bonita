<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::user()->tipo_usuario){
            return redirect('/empleado');
        }
        return redirect('/cliente');
    }
}
