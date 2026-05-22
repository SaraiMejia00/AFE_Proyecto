@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <div class="row justify-content-center mt-5">

        <div class="col-md-4">

            <div class="card shadow-sm border-0 rounded-4">

                <div class="card-body p-8">

                    <div class="text-center mb-4">

                        {{-- Imagen de Perfil --}}
                        <div class="mb-3">
                            <img src="https://cdn-icons-png.flaticon.com/512/1144/1144760.png" alt="Icono de Usuario"
                                class="rounded-circle img-thumbnail shadow-sm"
                                style="width: 100px; height: 100px; object-fit: cover; background-color: white;">
                        </div>

                        <h4 class="text-center fw-bold">
                            Iniciar Sesión
                        </h4>
                    </div>

                    {{-- Error login --}}
                    @if(session('error'))

                        <div class="alert alert-danger d-flex align-items-center rounded-3">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            {{ session('error') }}
                        </div>

                    @endif

                    <form action="{{ route('authenticate') }}" method="POST">

                        @csrf

                        {{-- Email --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Email
                            </label>

                            <input type="email" name="email" class="form-control rounded-3" placeholder="correo@ejemplo.com"
                                required autofocus>

                        </div>

                        {{-- Password --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Contraseña
                            </label>

                            <input type="password" name="password" class="form-control rounded-3" placeholder="••••••••"
                                required>

                        </div>

                        <button class="btn btn-dark w-100 py-2 fw-bold shadow-sm rounded-3">
                            Ingresar
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
