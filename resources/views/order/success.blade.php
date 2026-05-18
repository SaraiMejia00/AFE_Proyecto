@extends('layouts.app')

@section('title', 'Compra Realizada')

@section('content')

<x-page-header title="Compra Realizada Correctamente" />

<x-success-alert />

<div class="card border-0 shadow-sm mb-4">

    <div class="card-body">

        <h4 class="mb-3">

            Pedido #{{ $order->id }}

        </h4>

        <p>

            Gracias por tu compra.

        </p>

        <p>

            Estado actual:

            <span class="badge bg-success">

                {{ $order->status }}

            </span>

        </p>

        <h3>

            Total:
            ${{ number_format($order->total, 2) }}

        </h3>

    </div>

</div>

{{-- Productos --}}
<div class="card border-0 shadow-sm">

    <div class="card-header bg-dark text-white">

        Productos Comprados

    </div>

    <div class="card-body">

        <table class="table">

            <thead>

                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                </tr>

            </thead>

            <tbody>

                @foreach($order->items as $item)

                    <tr>

                        <td>

                            {{ $item->product?->name }}

                        </td>

                        <td>

                            {{ $item->quantity }}

                        </td>

                        <td>

                            ${{ number_format($item->price, 2) }}

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

<div class="mt-4">

    <a href="{{ route('products.shop') }}"
        class="btn btn-dark">

        Volver a Tienda

    </a>

</div>

@endsection