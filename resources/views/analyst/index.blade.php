@extends('layouts.admin')

@section('title', 'Panel Analista')

@section('content')

<x-page-header title="Panel Analista" />

{{-- KPIs --}}
<div class="row mb-4">

    {{-- Pedidos --}}
    <div class="col-md-4 mb-3">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <h5>

                    Total Pedidos

                </h5>

                <h2>

                    {{ $totalOrders }}

                </h2>

            </div>

        </div>

    </div>

    {{-- Ingresos --}}
    <div class="col-md-4 mb-3">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <h5>

                    Ingresos Totales

                </h5>

                <h2>

                    ${{ number_format($totalRevenue, 2) }}

                </h2>

            </div>

        </div>

    </div>

    {{-- Stock bajo --}}
    <div class="col-md-4 mb-3">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <h5>

                    Productos Bajo Stock

                </h5>

                <h2>

                    {{ $lowStockProducts }}

                </h2>

            </div>

        </div>

    </div>

</div>

{{-- Producto más vendido --}}
<div class="card shadow-sm border-0 mb-4">

    <div class="card-header bg-dark text-white">

        Producto Más Vendido

    </div>

    <div class="card-body">

        @if($topProduct)

            <h4>

                {{ $topProduct->product?->name }}

            </h4>

            <p>

                Cantidad Vendida:
                <strong>{{ $topProduct->total_sold }}</strong>

            </p>

        @else

            <p>

                No hay ventas registradas

            </p>

        @endif

    </div>

</div>

{{-- Últimos pedidos --}}
<div class="card shadow-sm border-0">

    <div class="card-header bg-dark text-white">

        Últimos Pedidos

    </div>

    <div class="card-body">

        <table class="table table-hover">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                </tr>

            </thead>

            <tbody>

                @forelse($latestOrders as $order)

                    <tr>

                        <td>

                            #{{ $order->id }}

                        </td>

                        <td>

                            ${{ number_format($order->total, 2) }}

                        </td>

                        <td>

                            <span class="badge bg-success">

                                {{ $order->status }}

                            </span>

                        </td>

                        <td>

                            {{ $order->created_at->format('d/m/Y H:i') }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4"
                            class="text-center">

                            No hay pedidos registrados

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection