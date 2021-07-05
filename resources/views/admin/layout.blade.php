<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema E-Pericia @section('title', '')</title>

    <link href="{{ asset('matrix/css/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style>
        #navbarSupportedContent{
            justify-content: space-between;
        }
    </style>
</head>
<body>

<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <a class="navbar-brand" href="index.html">
                        <b class="logo-icon ps-2">
                            E-PERÍCIA
                        </b>
                    </a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" >
                    <ul class="navbar-nav float-start">
                        <li class="nav-item d-none d-lg-block"><a
                                class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                    </ul>

                    <ul class="navbar-nav float-end ">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sistema <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('admin.sair') }}"><i
                                        class="fa fa-power-off me-1 ms-1"></i> Sair</a>

                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="pt-4">
                        @if(checkRole('admin.processo.index'))
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="#" aria-expanded="false"><i class="fas fa-archive"></i><span
                                    class="hide-menu">Processos </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                @if(checkRole('admin.processo.index'))
                                <li class="sidebar-item"><a href="{{ route('admin.processo.index')}}" class="sidebar-link"><i
                                            class="fas fa-plus"></i><span class="hide-menu"> Novo
                                        </span></a></li>
                                @endif

                                @if(checkRole('admin.processo.buscar'))
                                <li class="sidebar-item"><a href="{{ route('admin.processo.buscar')}}" class="sidebar-link"><i
                                            class="fas fa-find"></i><span class="hide-menu"> Buscar
                                        </span></a></li>
                                @endif
                            </ul>
                        </li>
                        @endif

                        @if(checkRole('admin.usuario.index') || checkRole('admin.usuario.buscar') || checkRole('admin.usuario.perfil'))
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="#" aria-expanded="false"><i class="fas fa-user"></i><span
                                    class="hide-menu">Usuários </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                @if(checkRole('admin.usuario.index'))
                                <li class="sidebar-item"><a href="{{ route('admin.usuario.index')}}" class="sidebar-link"><i
                                            class="fas fa-user-plus"></i><span class="hide-menu"> Novo
                                        </span></a></li>
                                @endif
                                @if(checkRole('admin.usuario.buscar'))
                                <li class="sidebar-item"><a href="{{ route('admin.usuario.buscar')}}" class="sidebar-link"><i
                                            class="fas fa-users"></i><span class="hide-menu"> Buscar
                                        </span></a></li>
                                @endif
                                @if(checkRole('admin.usuario.perfil'))
                                    <li class="sidebar-item"><a href="{{ route('admin.usuario.perfil')}}" class="sidebar-link"><i
                                            class="mdi mdi-format-list-bulleted-type"></i><span class="hide-menu"> Perfil
                                        </span></a></li>
                                @endif
                            </ul>
                        </li>
                        @endif
                        <li class="sidebar-item">
                            @if(checkRole('admin.tipo_pericia.index'))
                            <a class="sidebar-link waves-effect waves-dark" href="{{ route('admin.tipo_pericia.index') }}">
                                    <i class="mdi mdi-file-document-box"></i><span>Tipo de Perícia</span>
                            </a>
                            @endif
                        </li>
                        <li class="sidebar-item">
                            @if(checkRole('admin.documento_exigido.index'))
                            <a class="sidebar-link waves-effect waves-dark" href="{{ route('admin.documento_exigido.index') }}">
                                    <i class="mdi mdi-file-document-box"></i><span>Documentos Exigidos </span>
                            </a>
                            @endif
                        </li>
                        <li class="sidebar-item">
                            @if(checkRole('admin.tipo_documento.index'))
                            <a class="sidebar-link waves-effect waves-dark" href="{{ route('admin.tipo_documento.index') }}">
                                    <i class="mdi mdi-file-document-box"></i><span>Tipo de Documento </span>
                            </a>
                            @endif
                        </li>
                        <li class="sidebar-item">
                            @if(checkRole('admin.tag.index'))
                            <a class="sidebar-link waves-effect waves-dark" href="{{ route('admin.tag.index') }}">
                                    <i class="mdi mdi-tag"></i><span>Tag </span>
                            </a>
                            @endif
                        </li>
                        <li class="sidebar-item">
                            @if(checkRole('admin.fases.index'))
                            <a class="sidebar-link waves-effect waves-dark" href="{{ route('admin.fases.index') }}">
                                    <i class="mdi mdi-debug-step-over"></i><span>Fases </span>
                            </a>
                            @endif
                        </li>
                        <li class="sidebar-item">
                            @if(checkRole('admin.objeto.index'))
                            <a class="sidebar-link waves-effect waves-dark" href="{{ route('admin.objeto.index') }}">
                                    <i class="mdi mdi-buffer"></i><span>Objetos </span>
                            </a>
                            @endif
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if( Session::has( 'success' ) && Session::get( 'success' ) != "")
                            <div class="alert alert-success" role="alert">
                                {{ Session::get( 'success' ) }}
                            </div>
                        @endif

                        @if( Session::has( 'error' ) && Session::get( 'error' ) != "")
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get( 'error' ) }}
                            </div>
                        @endif
                    </div>
                    @yield('content')
                </div>
            </div>
            <footer class="footer text-center">
                Todos os direitos reservados.
            </footer>
        </div>
    </div>

    <script src="{{ asset('matrix/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('matrix/js/jquery.ui.touch-punch-improved.js') }}"></script>
    <script src="{{ asset('matrix/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('matrix/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('matrix/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('matrix/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('matrix/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('matrix/js/custom.min.js') }}"></script>
    <!-- this page js -->
    <script src="{{ asset('matrix/assets/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('matrix/assets/libs/fullcalendar/dist/fullcalendar.min.js') }}"></script>

</body>
</html>
