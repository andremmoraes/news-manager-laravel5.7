<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class PainelNewsController extends Controller
{
    public function index()
    {
        return view('auth.admin.painel');
    }

    # Editar sua conta
    public function perfil()
    {
        $user = \App\User::findOrFail(\Auth::id());

        return view('app.edit_user', compact('user'));
    }

    public function update_perfil(Request $request, $id)
    {
        $authUser = \App\User::findOrFail($id);

        if ($authUser->email == 'admin@admin.com') {
            $validator = Validator::make($request->all(), [
                'name'  =>  'required|max:100|min:3',
                'email' => 'required|email|unique:users'
            ]);

            $authUser->name = $request->input('name');
            $authUser->email = $request->input('email');
        } elseif ($request->input('password') != "") {
            $validator = Validator::make($request->all(), [
                'name'  =>  'required|max:100|min:3',
                'password' => 'min:3'
            ]);

            $authUser->name = $request->input('name');
            $authUser->password = \Hash::make($request->input('password'));
        } else {
            return redirect()->route('editar.perfil');
        }

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($authUser->save()) {
            $request->session()->flash('success', 'Dados atualizado com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao atualizar dados');
        }

        return redirect()->route('editar.perfil');
    }
}
