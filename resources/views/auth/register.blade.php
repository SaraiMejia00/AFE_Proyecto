@extends('layouts.app')

@section('title', 'Registro')

@section('content')

<div class="row justify-content-center mt-5">

    <div class="col-11 col-sm-8 col-md-6 col-lg-4">

        <div class="card shadow-sm border-0 rounded-4">

            <div class="card-body p-4">

                <div class="text-center mb-4">

                    <div class="mb-3">

                        <img
                            src="https://cdn-icons-png.flaticon.com/512/1144/1144760.png"
                            alt="Registro Usuario"
                            class="rounded-circle img-thumbnail shadow-sm"
                            style="width: 100px; height: 100px; object-fit: cover; background-color: white;">

                    </div>

                    <h4 class="fw-bold">
                        Crear Cuenta
                    </h4>

                    <p class="text-secondary small">
                        Registra una nueva cuenta
                    </p>

                </div>

                {{-- Errores --}}
                @if ($errors->any())

                    <div class="alert alert-danger rounded-3">

                        <ul class="mb-0">

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                <form action="{{ route('register.store') }}" method="POST">

                    @csrf

                    {{-- Nombre --}}
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Nombre
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control rounded-3"
                            placeholder="Nombre completo"
                            required>

                    </div>

                    {{-- Email --}}
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control rounded-3"
                            placeholder="correo@ejemplo.com"
                            required>

                    </div>

                    {{-- Password --}}
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Contraseña
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control rounded-3"
                            placeholder="••••••••"
                            required>

                    </div>

                    {{-- Confirmar Password --}}
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Confirmar Contraseña
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control rounded-3"
                            placeholder="••••••••"
                            required>

                    </div>

                    {{-- Botón --}}
                    <button class="btn btn-dark w-100 py-2 fw-bold shadow-sm rounded-3">

                        Registrarse

                    </button>

                </form>

                {{-- Link Login --}}
                <div class="text-center mt-4">

                    <small class="text-secondary">

                        ¿Ya tienes cuenta?

                        <a href="{{ route('login') }}"
                           class="text-dark fw-bold text-decoration-none">

                            Iniciar Sesión

                        </a>

                    </small>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- Footer --}}
<div class="row mt-5">

    <div class="col-12 text-center text-secondary">

        <small>
            &copy; 2026 TiendaOnline | v1.0.0
        </small>

    </div>

</div>

@endsection