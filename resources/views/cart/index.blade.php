@extends('layouts.app')

@section('title', 'Carrito')

@section('content')

<x-page-header title="Carrito de Compras" />

<x-success-alert />

@if(count($cart) > 0)

    @php
        $total = 0;
    @endphp

    <table class="table table-bordered align-middle">

        <thead class="table-dark">

            <tr>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Acciones</th>
            </tr>

        </thead>

        <tbody>

            @foreach($cart as $id => $item)

                @php
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                @endphp

                <tr>

                    {{-- Imagen --}}
                    <td width="120">

                        @if($item['image'])

                            <img
                                src="{{ asset('product_images/' . $item['image']) }}"
                                class="img-fluid rounded">

                        @endif

                    </td>

                    {{-- Nombre --}}
                    <td>

                        {{ $item['name'] }}

                    </td>

                    {{-- Precio --}}
                    <td>

                        ${{ number_format($item['price'], 2) }}

                    </td>

                    {{-- Cantidad --}}
                    <td width="150">

                        <form action="{{ route('cart.update', $id) }}"
                            method="POST">

                            @csrf
                            @method('PUT')

                            <div class="d-flex gap-2">

                                <input
                                    type="number"
                                    name="quantity"
                                    value="{{ $item['quantity'] }}"
                                    min="1"
                                    class="form-control">

                                <button class="btn btn-warning">

                                    OK

                                </button>

                            </div>

                        </form>

                    </td>

                    {{-- Subtotal --}}
                    <td>

                        ${{ number_format($subtotal, 2) }}

                    </td>

                    {{-- Acciones --}}
                    <td>

                        <form action="{{ route('cart.remove', $id) }}"
                            method="POST">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger">

                                Eliminar

                            </button>

                        </form>

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

    {{-- Total --}}
    <div class="text-end">

        <h3>

            Total:
            ${{ number_format($total, 2) }}

        </h3>

    </div>

@else

    <div class="alert alert-info">

        El carrito está vacío

    </div>

@endif

@endsection