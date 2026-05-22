<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 shadow">

    <div class="container">

        {{-- Logo--}}
        <a class="navbar-brand fw-bold text-uppercase d-flex align-items-center gap-2"
            href="{{ route('products.shop') }}">

            <i class="fas fa-microchip text-light"></i>
            <span>Tienda<span class="text-secondary">Online</span></span>

        </a>

        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarContent">

            <span class="navbar-toggler-icon"></span>

        </button>

        {{-- Contenido navbar --}}
        <div class="collapse navbar-collapse" id="navbarContent">

            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">

                {{-- Tienda --}}
                <li class="nav-item">

                    <a class="nav-link fw-semibold d-flex align-items-center gap-2 {{ request()->routeIs('products.shop') ? 'active' : '' }}"
                        href="{{ route('products.shop') }}">

                        <i class="fas fa-store"></i> Tienda

                    </a>

                </li>

                {{-- Carrito --}}
                <li class="nav-item">

                    <a class="nav-link fw-semibold d-flex align-items-center gap-2 {{ request()->routeIs('cart.*') ? 'active' : '' }}"
                        href="{{ route('cart.index') }}">

                        <i class="fas fa-shopping-cart"></i> Carrito

                    </a>

                </li>

                {{-- Usuario autenticado --}}
                @auth

                    <li class="nav-item dropdown ms-lg-3">

                        <a class="btn btn-outline-light dropdown-toggle rounded-pill px-3 d-flex align-items-center gap-2"
                            href="#" role="button" data-bs-toggle="dropdown">

                            <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-3 mt-2">

                            {{-- Panel según rol --}}
                            @if(
                                    Auth::user()->role?->name === 'admin' ||
                                    Auth::user()->role?->name === 'manager'
                                )

                                <li>

                                    <a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                        href="{{ route('dashboard') }}">

                                        <i class="fas fa-tachometer-alt text-muted"></i> Panel Administrativo

                                    </a>

                                </li>

                            @endif

                            {{-- Panel analista --}}
                            @if(Auth::user()->role?->name === 'analyst')

                                <li>

                                    <a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                        href="{{ route('analyst.index') }}">

                                        <i class="fas fa-chart-line text-muted"></i> Panel Analista

                                    </a>

                                </li>

                            @endif

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            {{-- Logout --}}
                            <li>

                                <form action="{{ route('logout') }}" method="POST">

                                    @csrf

                                    {{-- Botón de salida --}}
                                    <button class="dropdown-item d-flex align-items-center gap-2 py-2 fw-semibold">

                                        <i class="fas fa-sign-out-alt text-danger"></i> Cerrar Sesión

                                    </button>

                                </form>

                            </li>

                        </ul>

                    </li>

                    {{-- Usuario visitante --}}
                @else

                    <li class="nav-item ms-lg-3">

                        <a class="btn btn-light rounded-pill px-4 fw-bold d-flex align-items-center gap-2 shadow-sm"
                            href="{{ route('login') }}">

                            <i class="fas fa-sign-in-alt"></i> Iniciar Sesión

                        </a>

                    </li>

                @endauth

            </ul>

        </div>

    </div>

</nav>
