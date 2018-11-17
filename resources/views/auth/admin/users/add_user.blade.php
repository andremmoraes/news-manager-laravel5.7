@extends('auth.admin.painel')

@section('panel-admin')
    <div class="row">
    <div class="col-md-6">
        <div class="card">
            <form method="post" action="{{ route('admin.user.store') }}" class="form-horizontal">
                @csrf
                <div class="card-body">
                    <h4 class="card-title">Adicionar Usuário</h4>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Nome</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" placeholder="Nome" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">E-mail</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" placeholder="E-mail" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Senha</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" placeholder="Senha">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Cargo</label>
                        <div class="col-md-9">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="customControlValidation1" name="admin" value="0">
                                <label class="custom-control-label" for="customControlValidation1">Administrador</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="customControlValidation2" name="admin" value="1">
                                <label class="custom-control-label" for="customControlValidation2">Editor</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Criar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection