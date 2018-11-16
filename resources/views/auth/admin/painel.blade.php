<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="https://github.com/esjdev">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <title>Painel - Gerenciador de Notícias</title>
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/quill.snow.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand ml-2" href="{{ route('admin.painel.index') }}">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{ asset('images/logo-icon.png') }}" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                            <img src="{{ asset('images/logo-text.png') }}" alt="homepage" class="light-logo" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                    </ul>

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                            <!-- ============================================================== -->
                            <!-- User profile and search -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-lg mr-5 ml-5 mt-3"></i></a>
                                <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('editar.perfil') }}"><i class="ti-settings mr-2 ml-2"></i> {{ __('Configurações da conta') }}</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="fa fa-power-off mr-2 ml-2"></i> {{ __('Sair') }}</a>
                                    <div class="dropdown-divider"></div>
                                </div>
                            </li>
                            <!-- ============================================================== -->
                            <!-- User profile and search -->
                            <!-- ============================================================== -->
                        </ul>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <hr class="bg-dark">
                        <li class="sidebar-item"> <a href="{{ route('admin.dashboard.index') }}" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i> <span class="hide-menu">{{ __('Dashboard') }}</span></a></li>

                        <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark sidebar-link" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-cogs"></i> <span class="hide-menu">{{ __('Notícias') }}</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="{{ route('admin.news.list') }}" class="sidebar-link"><i class="fas fa-list-ul"></i> <span class="hide-menu"> {{ __('Todas notícias') }}</span></a></li>
                                <li class="sidebar-item"><a href="{{ route('admin.news.create') }}" class="sidebar-link"><i class="fas fa-plus-square"></i> <span class="hide-menu"> {{ __('Adicionar notícia') }}</span></a></li>
                            </ul>
                        </li>

                        @if(Auth::user()->admin == 0)
                            <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark sidebar-link" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-users"></i> <span class="hide-menu">{{ __('Usuários') }}</span></a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item"><a href="{{ route('admin.user.index') }}" class="sidebar-link"><i class="fas fa-list-ul"></i> <span class="hide-menu"> {{ __('Todos usuários') }}</span></a></li>
                                    <li class="sidebar-item"><a href="{{ route('admin.user.create') }}" class="sidebar-link"><i class="fas fa-plus-square"></i> <span class="hide-menu"> {{ __('Adicionar usuário') }}</span></a></li>
                                </ul>
                            </li>
                        @endif

                        <li class="sidebar-item"> <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false"><i class="fas fa-sign-out-alt"></i> <span class="hide-menu">{{ __('Sair') }}</span></a></li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <li class="sidebar-item bg-secondary"> <a href="{{ route('app.list') }}" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false"><span class="hide-menu ml-5">{{ __('Voltar para o site') }}</span></a></li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="page-wrapper">
            <div class="container-fluid">
                <!-- Mostrar erros de validações -->
                @if($errors->any())
                    @component('components.alert-danger')
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    @endcomponent
                @endif

                <!-- Mostrar Mensagem de sucessos -->
                @if(session('success'))
                    @component('components.alert-success')
                        {{ session('success') }}
                    @endcomponent
                @endif

                <!-- Mostrar erros -->
                @if(session('error'))
                    @component('components.alert-danger')
                        {{ session('error') }}
                    @endcomponent
                @endif

                @yield('panel-admin')

                <!-- Só vai dar include, se estiver na url (admin/painel) -->
                @if(Request::is('admin/painel'))
                    @include('auth.admin.welcome')
                @endif
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
            <hr class="w-50">
            <div class="container">
                <footer class="footer text-center">
                    Front-end por <a href="https://wrappixel.com" target="_blank">WrapPixel</a><br>Back-end feito com <span class="text-danger">❤</span> por <a href="https://github.com/esjdev" target="_blank">esjDEV</a> ✌
                </footer>
            </div>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
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
    <!-- Quill -->
    <script src="{{ asset('js/highlight.min.js') }}"></script>
    <script src="{{ asset('js/quill.min.js') }}"></script>
    <script>
         var quill = new Quill('#editor-container', {
            modules: {
                syntax: true,
                toolbar: '#toolbar-container'
            },
            placeholder: 'Conteúdo...',
            theme: 'snow'
        });

        $('form#add_news').submit(function() {
            var contents = $(".ql-editor").html();
            $('#quill-editor-input').val(contents);
            return true;
        });
    </script>
</body>
</html>