@extends('auth.admin.painel')

@section('panel-admin')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title m-b-0">Lista de Notícias</h5>
        </div>
        <table class="table">
            <thead>
                <tr class="bg-dark text-white text-center">
                    <th scope="col"><b>Titulo</b></th>
                    <th scope="col"><b>Conteúdo</b></th>
                    <th scope="col"><b>Visualizações</b></th>
                    <th scope="col"><b>Criado em</b></th>
                    <th scope="col"><b>Ação</b></th>
                </tr>
            </thead>
            @foreach ($news as $new)
                <tbody class="text-center">
                    <tr style="cursor:pointer;">
                        <td title="{{ strip_tags($new->title) }}"><a href="{{ route('news.list', [$new->id, $new->slug]) }}" target="_blank" class="text-dark">{{ str_limit(strip_tags($new->title), 20, ' ...') }}</a></td>
                        <td><a href="{{ route('news.list', [$new->id, $new->slug]) }}" target="_blank" class="text-dark">{{ str_limit(strip_tags($new->description), 80, ' ...') }}</a></td>
                        <td>{{ number_format($new->views, 0, '', '.') }}</td>
                        <td>
                            {{ date('d/m/Y H:i:s', strtotime($new->created_at)) }}
                            <br>
                            @if($new->updated_at != $new->created_at)
                                <small class="badge badge-pill badge-success" title="Update">
                                    <i class="mdi mdi-update"></i> {{ date('d/m/Y H:i:s', strtotime($new->updated_at)) }}
                                </small>
                            @endif
                        </td>
                        <td>
                            @if(\Auth::user()->admin == 0 OR \Auth::user()->id == $new->id_user)
                                <a href="{{ route('admin.news.edit', $new->id) }}" class="btn btn-info">Editar</a>
                            @endif

                            @if(\Auth::user()->admin == 0)
                                <form style="display:inline;" action="{{ route('admin.news.delete', $new->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"
                                    onclick="return confirm('Tem certeza que deseja remover a notícia?')">Deletar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>

    <div class="pagination">
        {{ $news->links() }}
    </div>
</div>
@endsection