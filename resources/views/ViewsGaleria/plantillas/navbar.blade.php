<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('home') }}">
            {{ __('Inicio') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Albumes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('album.index') }}">{{ __('Listar') }}</a>
                        <a class="dropdown-item" href="{{ route('album.create') }}">{{ __('Crear') }}</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Imagenes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('imagen.index') }}">{{ __('Listar') }}</a>
                        <a class="dropdown-item" href="{{ route('imagen.create') }}">{{ __('Subir') }}</a>
                    </div>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('album.misalbumes') }}">Mis Albumes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('imagen.misimagenes') }}">Mis Imagenes</a>
                </li>

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->

                @auth
                    <li class="nav-item">
                        <a class="nav-link">{{auth()->user()->persona->nombre}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Salir</a>
                    </li>
                @else
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('registrar') }}">{{ __('Registrarse') }}</a>
                        </li>
                    @endguest
                @endauth
            </ul>
        </div>
    </div>
</nav>
