@extends('auth.admin.painel')

@section('panel-admin')
    <h4 class="page-title">Dashboard</h4>
    
    <div class="row">

        <div class="col-md-6 col-lg-3" style="cursor:pointer">
            <div class="card card-hover">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white"><i class="fa fa-globe"></i></h1>
                    <h6 class="text-white">Visitantes Únicos</h6>
                    <h4 class="text-white">
                        @if (isset($countViewsUniq->views)) 
                            {{ number_format($countViewsUniq->views, 0, '', '.') }}
                        @else 
                            0
                        @endif
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3" style="cursor:pointer">
                <div class="card card-hover">
                    <div class="box bg-info text-center">
                        <h1 class="font-light text-white"><i class="fas fa-chart-line"></i></h1>
                        <h6 class="text-white">Visitas</h6>
                        <h4 class="text-white">
                            @if (isset($countViews->views)) 
                                {{ number_format($countViews->views, 0, '', '.') }} 
                            @else 
                                0
                            @endif
                        </h4>
                    </div>
                </div>
            </div>
        <div class="col-md-6 col-lg-3" style="cursor:pointer">
            <div class="card card-hover">
                <div class="box bg-warning text-center">
                    <h1 class="font-light text-white"><i class="fa fa-user"></i></h1>
                    <h6 class="text-white">Visualizações de Notícias</h6>
                    <h4 class="text-white">{{ number_format($viewsNews, 0, '', '.') }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3" style="cursor:pointer">
            <div class="card card-hover">
                <div class="box bg-danger text-center">
                    <h1 class="font-light text-white"><i class="far fa-newspaper"></i></h1>
                    <h6 class="text-white">Total de Notícias</h6>
                    <h4 class="text-white">{{ number_format($totalNews, 0, '', '.') }}</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Últimas postagens -->
    <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-0">Últimas postagens</h4>
                </div>
                <ul class="list-style-none">
                    @forelse ($listNews as $list)
                    <div class="posts">
                        <li class="d-flex no-block card-body">
                            <i class="far fa-newspaper m-3"></i>
                            <div>
                                <a href="{{ route('news.list', [$list->id, $list->slug]) }}" target="_blank" class="mb-0 font-medium p-0" data-toggle="tooltip" data-placement="left" title="{{ strip_tags($list->title) }}">
                                    {{ str_limit(strip_tags($list->title), 100, ' ...') }} - <small class="text-muted"><b>por</b> {{ $list->user->name }}</small>
                                </a>
                                <span class="text-muted">{{ str_limit(strip_tags($list->description), 200, ' ...') }}</span>
                            </div>
                            <div class="ml-auto">
                                <div class="text-right">
                                    <h5 class="text-muted mb-0">{{ date('d', strtotime($list->created_at)) }}</h5>
                                    <span class="text-muted font-16">{{ date('M', strtotime($list->created_at)) }}</span>
                                </div>
                            </div>
                        </li>
                    </div>
                    @empty
                        <div class="alert alert-danger ml-2 mr-2">
                            Não há postagens
                        </div>
                    @endforelse
                </ul>
            </div>

            <ul class="pagination">
                {{ $listNews->links() }}
            </ul>
        </div>
@endsection