<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Desarrollo de aplicaciones web - Desarrollo web en entorno servidor</title>
        <link rel="icon" type="image/x-icon" href="{{ url('assets/favicon.ico') }}" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        @yield('styles')
        <link href="{{ url('assets/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{ url('/') }}">Inicio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="#">Comenzar</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="#">Acerca de</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="#">Contacto</a></li>
                        <li class="nav-item">
                            @if(!session('user'))
                                <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('login') }}">Login</a>
                            @else
                                <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('logout') }}">Logout</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('post.create') }}">Crear Nueva Noticia</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="masthead" style="background-image: url(@section('bgimage'){{ url('assets/img/home-bg.jpg') }}@show)">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        @if(Request::url() == url(''))
                            <div class="site-heading">
                                <h1>DAW</h1>
                                <span class="subheading">Desarrollo Web</span>
                            </div>
                        @else
                            <div class="post-heading">
                                <h1>@yield('titulo')</h1>
                                <h2 class="subheading">@yield('entrada')</h2>
                                @yield('by')
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </header>
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

                    @if(session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    @yield('content')

                    @if(session('user') && !(Request::url() == url('post/create')))
                        <div class="d-flex justify-content-end mb-4" style="margin-top: 32px;"><a class="btn btn-primary text-uppercase" href="{{ url('post/create') }}">Nuevo artículo →</a></div>
                    @endif
                </div>
            </div>
        </div>
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">Reservados todos los derechos &copy; izvserver.hopto.org &#174; {{ now()->year }}</div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        @yield('scripts')
        <script src="{{ url('assets/js/scripts.js') }}"></script>
    </body>
</html>