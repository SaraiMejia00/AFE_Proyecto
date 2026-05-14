@extends('layouts.admin')

@section('title', 'Categorías')

@section('content')

<x-page-header title="Categorías">

    <x-create-button
        route="categories.create"
        text="Nueva Categoría" />

</x-page-header>

<x-success-alert />

<table class="table table-bordered">

    <thead class="table-dark">

        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>

    </thead>

    <tbody>

        @forelse($categories as $category)

            <tr>

                <td>{{ $category->id }}</td>

                <td>{{ $category->name }}</td>

                <td>{{ $category->description }}</td>

                <td class="d-flex gap-2">

                    <a href="{{ route('categories.edit', $category->id) }}"
                        class="btn btn-warning btn-sm">

                        Editar

                    </a>

                    <form class="delete-form" action="{{ route('categories.destroy', $category->id) }}"
                        method="POST">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">
                            Eliminar
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="4" class="text-center">
                    No hay categorías registradas
                </td>

            </tr>

        @endforelse

    </tbody>

</table>

@endsection