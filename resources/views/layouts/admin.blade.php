<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

    <div class="d-flex align-items-stretch">

        <aside class="collapse collapse-horizontal show text-bg-dark p-3 shadow-lg" id="menuLateral"
            style="width: 230px; min-height: 100vh;">

            {{-- Logo --}}
            <div class="d-flex align-items-center mb-4 pb-3 border-bottom border-secondary">
                <i class="bi bi-cart-fill fs-4 me-2 text-info"></i>
                <h5 class="mb-0 fw-bold">TiendaOnline</h5>
            </div>

            {{-- Navegación --}}
            <ul class="nav flex-column gap-2">

                {{-- Categorías --}}
                <li class="nav-item">

                    <a href="{{ route('categories.index') }}"
                        class="nav-link text-white d-flex align-items-center {{ request()->routeIs('categories.*') ? 'bg-secondary rounded shadow-sm' : '' }}">

                        <i class="bi bi-tags me-2"></i>

                        Categorías

                    </a>

                </li>

                {{-- Productos --}}
                <li class="nav-item">

                    <a href="{{ route('products.index') }}"
                        class="nav-link text-white d-flex align-items-center {{ request()->routeIs('products.*') ? 'bg-secondary rounded shadow-sm' : '' }}">

                        <i class="bi bi-box me-2"></i>

                        Productos

                    </a>

                </li>

                {{-- Inventario --}}
                <li class="nav-item">

                    <a href="{{ route('inventory.index') }}"
                        class="nav-link text-white d-flex align-items-center {{ request()->routeIs('inventory.*') ? 'bg-secondary rounded shadow-sm' : '' }}">

                        <i class="bi bi-box-seam me-2"></i>

                        Inventario

                    </a>

                </li>

                {{-- Pedidos --}}
                <li class="nav-item">

                    <a href="{{ route('orders.index') }}"
                        class="nav-link text-white d-flex align-items-center {{ request()->routeIs('orders.*') ? 'bg-secondary rounded shadow-sm' : '' }}">

                        <i class="bi bi-bag-check me-2"></i>

                        Pedidos

                    </a>

                </li>

                {{-- Analista --}}
                <li class="nav-item">

                    <a href="{{ route('analyst.index') }}"
                        class="nav-link text-white d-flex align-items-center {{ request()->routeIs('analyst.*') ? 'bg-secondary rounded shadow-sm' : '' }}">

                        <i class="bi bi-graph-up me-2"></i>

                        Analista

                    </a>

                </li>

                {{-- Dashboard --}}
                <li class="nav-item">

                    <a href="{{ route('dashboard') }}"
                        class="nav-link text-white d-flex align-items-center {{ request()->routeIs('dashboard') ? 'bg-secondary rounded shadow-sm' : '' }}">

                        <i class="bi bi-speedometer2 me-2"></i>

                        Dashboard

                    </a>

                </li>

                {{-- Tienda --}}
                <li class="nav-item mt-4 pt-3 border-top border-secondary">

                    <a href="{{ route('products.shop') }}"
                        class="nav-link text-white bg-dark border border-secondary rounded d-flex align-items-center justify-content-center mt-2 shadow-sm">

                        <i class="bi bi-shop me-2 text-info"></i>

                        Ir a Tienda

                    </a>

                </li>

            </ul>

        </aside>

        {{-- para que el footer se mantenga en la parte inferior de la pantalla--}}
        <main class="flex-grow-1 p-4 bg-white m-3 rounded shadow-sm border d-flex flex-column" style="min-width: 0;">

            {{-- Dispara la acción sobre el objetivo #menuLateral --}}
            <div class="mb-4">
                <button class="btn btn-outline-secondary d-flex align-items-center" type="button"
                    data-bs-toggle="collapse" data-bs-target="#menuLateral" aria-expanded="true"
                    aria-controls="menuLateral">
                    <i class="bi bi-list fs-5 me-2"></i> Menú
                </button>
            </div>

            @yield('content')

            {{-- Footer --}}
            <footer class="mt-auto pt-3 border-top text-center text-secondary">
                <small> TiendaOnline 2026 | v1.0.0</small>
            </footer>

        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-confirm-delete />

</body>

</html>