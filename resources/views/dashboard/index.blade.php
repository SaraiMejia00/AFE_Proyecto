@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<x-page-header title="Dashboard" />

{{-- Tarjetas KPI --}}
<div class="row mb-4">

    {{-- Total productos --}}
    <div class="col-md-3 mb-3">

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <h5 class="card-title">
                    Productos
                </h5>

                <h2>
                    {{ $totalProducts }}
                </h2>

            </div>

        </div>

    </div>

    {{-- Total categorías --}}
    <div class="col-md-3 mb-3">

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <h5 class="card-title">
                    Categorías
                </h5>

                <h2>
                    {{ $totalCategories }}
                </h2>

            </div>

        </div>

    </div>

    {{-- Productos activos --}}
    <div class="col-md-3 mb-3">

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <h5 class="card-title">
                    Productos Activos
                </h5>

                <h2>
                    {{ $activeProducts }}
                </h2>

            </div>

        </div>

    </div>

    {{-- Stock total --}}
    <div class="col-md-3 mb-3">

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <h5 class="card-title">
                    Stock Total
                </h5>

                <h2>
                    {{ $totalStock }}
                </h2>

            </div>

        </div>

    </div>

</div>

{{-- Últimos productos --}}
<div class="card border-0 shadow-sm">

    <div class="card-header bg-dark text-white">

        Últimos Productos Registrados

    </div>

    <div class="card-body">

        <table class="table table-hover">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                </tr>

            </thead>

            <tbody>

                @forelse($latestProducts as $product)

                    <tr>

                        <td>{{ $product->id }}</td>

                        <td>{{ $product->name }}</td>

                        <td>
                            ${{ number_format($product->price, 2) }}
                        </td>

                        <td>{{ $product->stock }}</td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center">

                            No hay productos registrados

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection