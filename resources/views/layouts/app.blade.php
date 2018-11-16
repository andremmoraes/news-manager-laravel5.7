<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <title>{{ config('app.name') }} - List News</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="https://github.com/esjdev">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
    <style>body{background-color:#f2f2f2;}</style>
  </head>
  <body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    SeuSite
                </a>

                <ul class="navbar-nav float-left mr-auto">
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
                    <div class="col-lg-12 col-md-12">
                        <div class="input-group">
                            <form action="{{ route('search.list') }}" method="post" class="form-inline m-auto">
                                @csrf
                                <div id="custom-search-input">
                                    <div class="input-group">
                                        <input type="text" class="form-control col-lg-12" name="news_search" placeholder="Procurar..." style="width:300px;outline:none;"> 
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </ul>

                <a class="topbartoggler d-block d-md-none waves-effect waves-light text-white" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="mdi mdi-menu mdi-24px"></i></a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home"></i> {{ __('Home') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contato.index') }}"><i class="far fa-envelope"></i> {{ __('Contato') }}</a>
                                </li>
                            @endauth
                        </ul>
    
                        <aside class="left-sidebar" data-sidebarbg="skin5">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home"></i> {{ __('Home') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contato.index') }}"><i class="far fa-envelope"></i> {{ __('Contato') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-user"></i> {{ __('Entrar') }}</a>
                                </li>
                            @else
                                <li class="nav-item bg-warning mr-2">
                                    <a href="{{ route('admin.painel.index') }}" class="nav-link"><i class="fas fa-cogs"></i> {{ __('Admin') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('logout') }}" class="nav-link bg-danger" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                        </ul>
                        </aside>
                    </div>
            </div>
        </nav>

        <div class="container mt-2">
            @yield('content')
        </div>

        <!-- Footer -->
	    <section id="footer">
            <div class="container">	
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-4 text-center text-dark">
                        <small>&copy Todos os Direitos Reservados.<br>Criado com ❤ por <a href="https://github.com/esjdev" target="_blank">esjDEV</a> ✌</small>
                    </div>
                    </hr>
                </div>	
            </div>
        </section>
        <!-- ./Footer -->
    </div>      

    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $('[data-toggle="tooltip"]').tooltip();
        $(".preloader").fadeOut();
    </script>

    @yield('script')
  </body>
</html>