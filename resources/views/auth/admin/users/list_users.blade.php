@extends('auth.admin.painel')

@section('panel-admin')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title m-b-0">Lista de Usuários</h5>
        </div>
        <table class="table">
            <thead>
                <tr class="bg-dark text-white text-center">
                    <th scope="col"><b>#</b></th>
                    <th scope="col"><b>Nome</b></th>
                    <th scope="col"><b>E-mail</b></th>
                    <th scope="col"><b>Cargo</b></th>
                    <th scope="col"><b>Ação</b></th>
                </tr>
            </thead>
            @foreach ($users as $key => $user)
                <tbody class="text-center">
                    <tr class="@if($user->id == Auth::id()) bg-light text-dark @endif">
                        <th scope="row" style="@if($user->id == Auth::id()) font-weight:bold; @endif">{{ ($users->currentpage()-1) * $users->perpage() + $key + 1 }}º</th>
                        <td style="@if($user->id == Auth::id()) font-weight:bold; @endif">{{ $user->name }} 
                            @if($user->id == Auth::id()) <small>(você)</small> @endif
                        </td>
                        <td style="@if($user->id == Auth::id()) font-weight:bold; @endif">{{ $user->email }}</td>
                        <td>
                            @if($user->admin == 0)
                                <span style="color:red;font-weight:bold;">Administrador</span>
                            @else
                                <span style="color:green;font-weight:bold;">Editor</span>
                            @endif
                        </td>
                        <td>
                            @if($user->id != Auth::id() && \Auth::user()->admin != $user->admin)
                                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-info">Editar</a>

                                <form style="display:inline;" action="{{ route('admin.user.delete', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"
                                    onclick="return confirm('Tem certeza que deseja remover o usuário?')">Deletar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>

    <div class="pagination">
        {{ $users->links() }}
    </div>
</div>
@endsection