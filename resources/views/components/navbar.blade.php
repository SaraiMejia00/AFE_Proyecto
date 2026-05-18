<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        {{-- Logo --}}
        <a class="navbar-brand"
            href="{{ route('products.shop') }}">

            TiendaOnline

        </a>

        {{-- Botón responsive --}}
        <button class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarContent">

            <span class="navbar-toggler-icon"></span>

        </button>

        {{-- Contenido navbar --}}
        <div class="collapse navbar-collapse"
            id="navbarContent">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                {{-- Tienda --}}
                <li class="nav-item">

                    <a class="nav-link {{ request()->routeIs('products.shop') ? 'active' : '' }}"
                        href="{{ route('products.shop') }}">

                        Tienda

                    </a>

                </li>

                {{-- Carrito --}}
                <li class="nav-item">

                    <a class="nav-link {{ request()->routeIs('cart.*') ? 'active' : '' }}"
                        href="{{ route('cart.index') }}">

                        Carrito

                    </a>

                </li>

                {{-- Usuario autenticado --}}
                @auth

                    <li class="nav-item dropdown ms-lg-3">

                        <a class="btn btn-outline-light dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown">

                            {{ Auth::user()->name }}

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">

                            {{-- Panel según rol --}}
                            @if(Auth::user()->role?->name === 'admin' ||
                                Auth::user()->role?->name === 'manager')

                                <li>

                                    <a class="dropdown-item"
                                        href="{{ route('dashboard') }}">

                                        Panel Administrativo

                                    </a>

                                </li>

                            @endif

                            {{-- Panel analista --}}
                            @if(Auth::user()->role?->name === 'analyst')

                                <li>

                                    <a class="dropdown-item"
                                        href="{{ route('analyst.index') }}">

                                        Panel Analista

                                    </a>

                                </li>

                            @endif

                            <li><hr class="dropdown-divider"></li>

                            {{-- Logout --}}
                            <li>

                                <form action="{{ route('logout') }}"
                                    method="POST">

                                    @csrf

                                    <button class="dropdown-item">

                                        Cerrar Sesión

                                    </button>

                                </form>

                            </li>

                        </ul>

                    </li>

                {{-- Usuario visitante --}}
                @else

                    <li class="nav-item ms-lg-3">

                        <a class="btn btn-outline-light"
                            href="{{ route('login') }}">

                            Iniciar Sesión

                        </a>

                    </li>

                @endauth

            </ul>

        </div>

    </div>

</nav>