<?php

namespace App\Http\Controllers;

use App\Mail\PagoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class MailController extends Controller
{
    function pago(){
        Mail::to('exequiel@gmail.com')->send(new PagoMailable);
        return view('checkout');
        // return view('emails.Pago');
    }
    function comprobante(Request $request){
        $imagen =  $request->file('comprobante')->store('public');
        $url = Storage::url($imagen);

        return $url;
    }
}
