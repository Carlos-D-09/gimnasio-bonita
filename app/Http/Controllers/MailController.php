<?php

namespace App\Http\Controllers;

use App\Mail\Correo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        /*$date = Carbon::now();
        dd($date);*/
        $content = 'mail.mail';
        return view('dashboard', compact('content'));
    }

    public function sendEmail(Request $request){
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message
        ];
        Mail::to('alejandroSoporteTecnico@gmail.com')->send(new Correo($data));
        $notification = 'Correo enviado a soporte tecnico';
        $content = 'mail.mail';
        return view('dashboard', compact('content', 'notification'));
    }
}
