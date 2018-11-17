@extends('layouts.app')

@section('content')
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center">
        <div class="auth-box text-dark">
            <div id="loginform">
                <div class="text-center p-t-20 p-b-20">
                    <h4 class="db">Formulário de Contato</h4>
                </div>
    
                <!-- Form -->
                <form class="form-horizontal m-t-20" id="loginform" action="{{ route('contato.email') }}" method="post">
                    @csrf
                    <div class="row p-b-30">
                        <div class="col-12">

                            <!-- Mostrar erros de validações -->
                            @include('components.messages.errors_validations')

                            <!-- Mostrar Mensagem de sucessos -->
                            @include('components.messages.success_validation')

                            <!-- Mostrar erros -->
                            @include('components.messages.failed_validation')
    
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Nome" name="name" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="E-mail" name="email" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mb-3">
                                <textarea name="message" class="form-control" cols="30" rows="10" placeholder="Mensagem"></textarea>
                            </div>
    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="p-t-20">
                                    <button class="btn btn-primary float-right" type="submit">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection