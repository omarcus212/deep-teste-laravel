@extends('layouts.app')

@section('title', 'Deep Cadastro')

@section('content')

    <div class="container-fluid min-vh-100 bg-dark text-white">
        <div class="row min-vh-100">

            <!-- Banner -->
            <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center bg-white">
                <img src="{{ asset('img/deep-logo-2.avif') }}" class="img-fluid" style="max-height: 80%;" alt="Banner">
            </div>

            <!-- Formulário -->
            <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center px-3 px-sm-4 px-md-5">
                <div class="w-100" style="max-width: 420px;">

                    <div class="text-center mb-2 mt-4 d-flex flex-column align-items-center">
                        <img src="{{ asset('img/deep-logo-1.png') }}" class="mb-3" alt="Deep" style="height: 3rem;">
                        <h2 class="fw-bold">Criar conta</h2>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="no-loading">
                        @csrf

                        <!-- Nome -->
                        <div class="mb-3">
                            <label class="form-label text-secondary">Nome</label>
                            <input type="text" name="name"
                                class="form-control form-control-lg bg-dark text-white border-secondary"
                                placeholder="Seu nome" value="{{ old('name') }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label text-secondary">E-mail</label>
                            <input type="email" name="email"
                                class="form-control form-control-lg bg-dark text-white border-secondary"
                                placeholder="email@exemplo.com" value="{{ old('email') }}" required>
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
                           <small class="@error('password') text-danger @else text-secondary @enderror">
                                A senha precisa ter no mínimo 8 caracteres
                            </small>
                        </div>

                        <!-- Confirmar Senha -->
                        <div class="mb-4">
                            <label class="form-label text-secondary">Confirmar senha</label>
                            <input type="password" name="password_confirmation"
                                class="form-control form-control-lg bg-dark text-white border-secondary"
                                placeholder="********" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-2 fw-bold">
                            Criar conta
                        </button>
                    </form>

                    <p class="text-center text-secondary mt-4">
                        Já tem uma conta?
                        <a href="{{ route('login') }}" class="text-success fw-semibold text-decoration-none">
                            Fazer login
                        </a>
                    </p>

                </div>
            </div>

        </div>
    </div>

@endsection