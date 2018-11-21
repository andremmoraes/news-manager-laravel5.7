<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;

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

    public function update_perfil(UpdateUserRequest $request, $id)
    {
        $authUser = \App\User::findOrFail($id);

        if ($authUser->id == \Auth::id()) { // Somente o proprio usuário pode editar sua conta

            // Update
            $authUser->name = $request->input('name');

            if ($authUser->email == 'admin@admin.com'):
                $authUser->email = $request->input('email');
            endif;

            if ($request->input('password') != ""):
                $authUser->password = \Hash::make($request->input('password'));
            endif;

            if ($authUser->save()) {
                $request->session()->flash('success', 'Dados atualizado com sucesso!');
            } else {
                $request->session()->flash('error', 'Erro ao atualizar dados');
            }
        }

        return redirect()->route('editar.perfil');
    }
}
