@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card p-3 w-100">
            <h2>{{ str_limit($list->title) }}</h2>
            <small class="blockquote-footer">
                <i class="mdi mdi-clock"></i> <cite title="Source Title">{{ date('d/m/Y H:i:s', strtotime($list->created_at)) }} -
                <i class="mdi mdi-account"></i> Por {{ $list->user->name }} -
                <i class="mdi mdi-poll" title="Update"></i> {{ number_format($list->views, 0, '', '.') }} visualizações</cite>
            </small>
            <div class="pt-4">{!! $list->description !!}</div>
        </div>
    </div>
@endsection

@section('script')
    <script>$(document).ready(function ($) { $('img').attr('style', 'width:auto;max-width:100%;'); });</script>    
@endsection