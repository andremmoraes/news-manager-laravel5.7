@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">
                <h4 class="card-title mb-0">Procurando por "{{ \Request::input('news_search') }}"</h4>
            </div>
            <ul class="list-style-none mx-0">
                @forelse ($search as $value)
                <div class="posts">
                    <li class="d-flex no-block card-body">
                        <i class="far fa-newspaper m-3"></i>
                        <div>
                            <a href="{{ route('news.list', [$value->id, $value->slug]) }}" target="_blank" class="mb-0 font-medium p-0" data-toggle="tooltip" data-placement="left" title="{{ strip_tags($value->title) }}">
                                {{ str_limit(strip_tags($value->title), 100, ' ...') }} - <small class="text-muted"><b>por</b> {{ $value->user->name }}</small>
                            </a><br>
                            <span class="text-muted col-sm-5">{{ str_limit(strip_tags($value->description), 100, ' ...') }}</span>
                        </div>
                        <div class="ml-auto">
                            <div class="text-right">
                                <h5 class="text-muted mb-0">{{ date('d', strtotime($value->created_at)) }}</h5>
                                <span class="text-muted font-16">{{ date('M', strtotime($value->created_at)) }}</span>
                            </div>
                        </div>
                    </li>
                </div>
                @empty
                    <div class="alert alert-danger mr-2">
                        Sem resultado...
                    </div>
                @endforelse
            </ul>
        </div>
    </div>
@endsection