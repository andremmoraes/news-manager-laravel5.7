@extends('auth.admin.painel')

@section('panel-admin')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title m-b-0">{{ __('Lista de Usuários') }}</h5>
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
                    <tr {!! ($user->id == Auth::id() ? 'class="bg-light text-dark"' : '') !!}>
                        <th scope="row" style="{{ ($user->id == Auth::id() ? 'font-weight:bold;' : '') }}">{{ ($users->currentpage()-1) * $users->perpage() + $key + 1 }}º</th>
                        <td {!! ($user->id == Auth::id() ? 'style="font-weight:bold;"' : '') !!}>{{ $user->name }} {!! ($user->id == Auth::id() ? '<small>(você)</small>' : '') !!}</td>
                        <td {!! ($user->id == Auth::id() ? 'style="font-weight:bold;"' : '') !!}>{{ $user->email }}</td>
                        <td>
                            @if($user->admin == 0)
                                {!! '<span style="color:red;font-weight:bold;">Administrador</span>' !!}
                            @else
                                {!! '<span style="color:green;font-weight:bold;">Editor</span>' !!}
                            @endif
                        </td>
                        <td>
                            @if($user->id != Auth::id() && \Auth::user()->admin != $user->admin)
                                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-info">{{ __('Editar') }}</a>

                                <form style="display:inline;" action="{{ route('admin.user.delete', $user->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger" type="submit"
                                    onclick="return confirm('Tem certeza que deseja remover o usuário?')">{{ __('Deletar') }}</button>
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