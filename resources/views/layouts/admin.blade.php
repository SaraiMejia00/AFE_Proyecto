<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


</head>

<body class="bg-light">

    <div class="d-flex">

        {{-- Sidebar --}}
        <aside class="bg-dark text-white p-3"
            style="width: 260px; min-height: 100vh;">

            {{-- Logo --}}
            <h3 class="mb-4">

                TiendaOnline

            </h3>

            {{-- Navegación --}}
            <ul class="nav flex-column gap-2">


                {{-- Categorías --}}
                <li class="nav-item">

                    <a href="{{ route('categories.index') }}"
                        class="nav-link text-white {{ request()->routeIs('categories.*') ? 'bg-secondary rounded' : '' }}">

                        <i class="bi bi-tags"></i>

                        Categorías

                    </a>

                </li>

                {{-- Productos --}}
                <li class="nav-item">

                    <a href="{{ route('products.index') }}"
                        class="nav-link text-white {{ request()->routeIs('products.*') ? 'bg-secondary rounded' : '' }}">

                        <i class="bi bi-box"></i>

                        Productos

                    </a>

                </li>

                {{-- Inventario --}}
                <li class="nav-item">

                    <a href="{{ route('inventory.index') }}"
                        class="nav-link text-white {{ request()->routeIs('inventory.*') ? 'bg-secondary rounded' : '' }}">

                        <i class="bi bi-box-seam"></i>

                        Inventario

                    </a>

                </li>

                {{-- Pedidos --}}
                <li class="nav-item">

                    <a href="{{ route('orders.index') }}"
                        class="nav-link text-white {{ request()->routeIs('orders.*') ? 'bg-secondary rounded' : '' }}">

                        <i class="bi bi-bag-check"></i>

                        Pedidos

                    </a>

                </li>

                {{-- Analista --}}
                <li class="nav-item">

                    <a href="{{ route('analyst.index') }}"
                        class="nav-link text-white {{ request()->routeIs('analyst.*') ? 'bg-secondary rounded' : '' }}">

                        <i class="bi bi-graph-up"></i>

                        Analista

                    </a>

                </li>

                {{-- Dashboard --}}
                <li class="nav-item">

                    <a href="{{ route('dashboard') }}"
                        class="nav-link text-white {{ request()->routeIs('dashboard') ? 'bg-secondary rounded' : '' }}">

                        <i class="bi bi-speedometer2"></i>

                        Dashboard

                    </a>

                </li>

                {{-- Tienda --}}
                <li class="nav-item mt-4">

                    <a href="{{ route('products.shop') }}"
                        class="nav-link text-white">

                        <i class="bi bi-shop"></i>

                        Ir a Tienda

                    </a>

                </li>

            </ul>

        </aside>

        {{-- Contenido --}}
        <main class="flex-grow-1 p-4">

            @yield('content')

        </main>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-confirm-delete />

</body>

</html>