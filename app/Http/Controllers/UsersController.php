<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersUpdateRequest;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::OrderBy('admin', 'ASC')->simplePaginate(10);
        return view('auth.admin.users.list_users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.admin.users.add_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $data = $request->all();

        $data['password'] = Hash::make($request->input('password'));

        if (User::create($data)) {
            $request->session()->flash('success', 'Usuário adicionado com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao cadastrar usuário');
        }

        return redirect()->route('admin.user.create');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        if ($user->id != \Auth::id() && \Auth::user()->admin != $user->admin) {
            return view('auth.admin.users.edit_user', compact('user'));
        }
        
        return redirect()->route('admin.user.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersUpdateRequest $request, $id)
    {
        $authUser = User::findOrFail($id);

        if ($authUser->id != \Auth::id() && \Auth::user()->admin != $authUser->admin) {
            $authUser->name = $request->input('name');

            if ($request->input('password') != ""):
                $authUser->password = \Hash::make($request->input('password'));
            endif;

            if ($authUser->admin != $request->input('admin')):
                $authUser->admin = $request->input('admin');
            endif;

            if ($authUser->save()) {
                $request->session()->flash('success', 'Usuário atualizado com sucesso!');
            } else {
                $request->session()->flash('error', 'Erro ao atualizar usuário');
            }
        }

        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $user = User::findOrFail($id);
        if ($user->id != \Auth::id() && \Auth::user()->admin == 0 && $user->admin == 1) {
            if ($user->delete()) {
                $request->session()->flash('success', 'Usuário deletado com sucesso!');
            } else {
                $request->session()->flash('error', 'Erro ao deletar usuário');
            }

            return redirect()->route('admin.user.index');
        } else {
            $request->session()->flash('error', 'Erro ao deletar usuário');
            return redirect()->route('admin.user.index');
        }
    }
}
