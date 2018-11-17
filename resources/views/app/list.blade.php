@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="card-columns col-lg-12 col-10 mt-2">
        @forelse ($listNews as $list)
            <div class="card mb-3">
                <a href="{{ route('news.list', [$list->id, $list->slug]) }}" class="link-news text-dark">
                    <div class="text-center view hm-zoom">
                        @php
                            $image = preg_match('/(<img [^>]+\>)/i', $list->description, $img); // Pega somente a tag image do conteúdo
                        @endphp

                        @if($image == 1)
                            @php
                                $setImage = preg_replace('/(width|height)="(.+)"/i', '', $img[0]); // Remove as tags Width e Height da tag image

                                echo $setImage; // Mostra a imagem
                            @endphp
                        @endif
                    </div>

                    <div class="bg-secondary"><h5 class="card-title text-white p-1">{{ str_limit(strip_tags($list->title), 75, ' ...') }}</h5></div>
                    <p class="text-secondary pl-2 font-italic">
                        {{ str_limit(strip_tags($list->description), 100, ' ...') }}
                        <small class="blockquote-footer pl-1 pt-3 text-black-50"><i class="mdi mdi-clock"></i> {{ date('d/m/Y H:i:s', strtotime($list->created_at)) }}</small>
                    </p>
                </a>
            </div>
        @empty
            Não há notícias
        @endforelse
    </div>
    
    <div class="pagination">
        {{ $listNews->links() }}
    </div>
</div>
<hr>
@endsection

@section('script')
    <script>$(document).ready(function ($) { $('img').attr('style', 'width:355px;;height:200px;'); });</script>    
@endsection