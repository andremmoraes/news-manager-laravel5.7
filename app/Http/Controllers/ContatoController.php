<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContatoMail;
use App\Http\Requests\ContatoRequest;

class ContatoController extends Controller
{
    public function index()
    {
        return view('layouts.contato');
    }

    public function mail(ContatoRequest $request)
    {
        Mail::to(config('app.email'))->send(new ContatoMail($request));
        $request->session()->flash('success', 'E-mail enviado com sucesso!');

        return redirect()->route('contato.index');
    }
}
