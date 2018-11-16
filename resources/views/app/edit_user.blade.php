@extends('auth.admin.painel')

@section('panel-admin')
    <div class="row">
    <div class="col-md-6">
        <div class="card">
            {{-- {{ route('admin.user.update', $user->id) }} --}}
            <form method="post" action="{{ route('editar.perfil.update', $user->id) }}" class="form-horizontal">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="card-body">
                    <h4 class="card-title">Editar</h4>
                    <div class="form-group row {{ ($user->email == 'admin@admin.com' ? 'invisible' : '') }}">
                        <label class="col-sm-3 text-right control-label col-form-label">Nome</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" placeholder="Nome" value="{{ old('name', $user->name) }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">E-mail</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" placeholder="E-mail" value="{{ old('email', $user->email) }}" {{ ($user->email == 'admin@admin.com' ? '' : 'disabled') }}>

                            {!! ($user->email == 'admin@admin.com' ? '<small class="text-danger">Altere seu e-mail para visualizar seus dados corretamente.</small>' : '') !!}
                        </div>
                    </div>
                    <div class="form-group row {{ ($user->email == 'admin@admin.com' ? 'invisible' : '') }}">
                        <label class="col-sm-3 text-right control-label col-form-label">Senha</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" placeholder="Senha">
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection