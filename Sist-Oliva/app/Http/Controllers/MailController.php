<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Mail\PagoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class MailController extends Controller
{
    function pago(Request $request)
    {
        // return $request;
        $id = $request->id;
        $total = $request->total;
        $idCliente = Auth::user()->id;
        $estado = $request->estado;
        $correo = Cliente::where('id', $idCliente)->value('correo');
        // dd($correo);
        Mail::to($correo)->send(new PagoMailable($id, $total));
        return view('checkout', ['estado' => $estado, 'id' => $id]);
        // return view('emails.Pago');
    }
    function comprobante(Request $request)
    {
        $imagen =  $request->file('comprobante')->store('public');
        $url = Storage::url($imagen);

        return $url;
    }
}
