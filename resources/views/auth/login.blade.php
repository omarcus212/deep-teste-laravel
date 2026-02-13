@extends('layouts.app')

@section('title', 'Deep - Login')

@section('content')

    <div class="container-fluid min-vh-100 bg-dark text-white">
        <div class="row min-vh-100">

            <!-- Banner -->
            <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center bg-white">
                <img src="{{ asset('img/deep-logo-2.avif') }}" class="img-fluid" style="height: 30%;" alt="Deep Banner">
            </div>

            <!-- Formulário -->
            <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center px-3 px-sm-4 px-md-5">
                <div class="w-100" style="max-width: 420px;">

                    <div class="text-center mb-4 d-flex flex-column align-items-center">
                        <img src="{{ asset('img/deep-logo-1.png') }}" class="mb-4" alt="Deep" style="height: 3rem;">
                        <h2 class="fw-bold">Bem-vindo</h2>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label text-secondary">E-mail</label>
                            <input type="email" name="email"
                                class="form-control form-control-lg bg-dark text-white border-secondary"
                                placeholder="email@gmail.com" value="{{ old('email') }}" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Senha -->
                        <div class="mb-3">
                            <label class="form-label text-secondary">Senha</label>
                            <input type="password" name="password"
                                class="form-control form-control-lg bg-dark text-white border-secondary"
                                placeholder="********" required>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-2 fw-bold">
                            Continuar
                        </button>
                    </form>

                    <div class="d-flex align-items-center my-4">
                        <div class="flex-fill border-top border-secondary"></div>
                        <span class="px-3 text-secondary">ou</span>
                        <div class="flex-fill border-top border-secondary"></div>
                    </div>

                    <p class="text-center text-secondary">
                        Não tem conta?
                        <a href="{{ route('register') }}" class="text-success fw-semibold text-decoration-none">
                            Criar conta
                        </a>
                    </p>

                </div>
            </div>

        </div>
    </div>

@endsection