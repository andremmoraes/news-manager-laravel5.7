@extends('auth.admin.painel')

@section('panel-admin')
    <div class="row">
    <div class="col-md-6">
        <div class="card">
        <form method="post" action="{{ route('admin.news.update', $news->id) }}" class="form-horizontal" id="add_news">
            @csrf
            @method('PUT')
            <div class="card-body">
                <h4 class="card-title">Editar notícia (ID: {{ $news->id }})</h4>
                <div class="form-group row">
                    <label class="text-left control-label col-form-label ml-3">Titulo</label>
                    <div class="col-lg-11">
                        <input type="text" class="form-control" name="title" placeholder="Titulo" value="{{ (old('title') ?? $news->title ) }}">
                    </div>
                </div>
                <div class="form-group">
                    <div id="toolbar-container">
                        <span class="ql-formats">
                            <select class="ql-font"></select>
                            <select class="ql-size"></select>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-bold"></button>
                            <button class="ql-italic"></button>
                            <button class="ql-underline"></button>
                            <button class="ql-strike"></button>
                        </span>
                        <span class="ql-formats">
                            <select class="ql-color"></select>
                            <select class="ql-background"></select>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-script" value="sub"></button>
                            <button class="ql-script" value="super"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-header" value="1"></button>
                            <button class="ql-header" value="2"></button>
                            <button class="ql-blockquote"></button>
                            <button class="ql-code-block"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-list" value="ordered"></button>
                            <button class="ql-list" value="bullet"></button>
                            <button class="ql-indent" value="-1"></button>
                            <button class="ql-indent" value="+1"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-direction" value="rtl"></button>
                            <select class="ql-align"></select>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-link"></button>
                            <button class="ql-image"></button>
                            <button class="ql-video"></button>
                            <button class="ql-formula"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-clean"></button>
                        </span>
                        </div>
                        <input name="description" id="quill-editor-input" type="hidden">
                        <div id="editor-container" style="height:300px;">{!! $news->description  !!}</div>
                    </div>
                </div>

                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                        <a href="{{ route('admin.news.list') }}" class="btn btn-danger ml-1">Voltar</a>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection