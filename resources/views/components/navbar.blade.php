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

                {{-- Dashboard Admin --}}
                <li class="nav-item ms-lg-3">

                    <a class="btn btn-outline-light"
                        href="{{ route('dashboard') }}">

                        Panel Admin

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>