<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        {{-- Logo / Nombre sistema --}}
        <a class="navbar-brand" href="{{ route('dashboard') }}">
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

            <ul class="navbar-nav ms-auto">
                
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

                {{-- Categorías --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}"
                        href="{{ route('categories.index') }}">
                        Categorías
                    </a>
                </li>

                {{-- Productos --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}"
                        href="{{ route('products.index') }}">
                        Productos
                    </a>
                </li>

                {{-- Inventario --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('inventory.*') ? 'active' : '' }}"
                        href="{{ route('inventory.index') }}">
                        Inventario
                    </a>
                </li>

                {{-- Dashboard --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>