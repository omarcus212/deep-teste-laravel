@extends('layouts.app')

@section('title', 'Deep - Perfil')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/user/profile.css') }}">
    <script src="{{ asset('js/user/profile.js') }}"></script>

    <div class="profile-container bg-dark">
        <span class="deep-logo position-absolute top-0 start-0 p-3">
            <img src="{{ asset('img/deep-logo-1.png') }}" class="img-fluid" style="height: 28px;" alt="Deep Banner">
        </span>

        <div class="profile-card">
            <div class="text-center mb-4">

                @if (auth()->user()->photo)
                    <img src="{{ asset('storage/' . auth()->user()->photo) }}" class="avatar-circle">
                @else
                    <div class="avatar-circle">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                @endif

            </div>

            <form action="{{ route('profile.photo.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="file" name="photo" accept="image/*" class="form-control mb-1" required>
                <button class="btn btn-primary mb-2">Alterar Foto</button>
            </form>

            <form method="POST" action="{{ route('profile.update') }}" id="profileForm">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}"
                            readonly>
                        <button class="btn btn-edit" type="button" id="enableProfileEdit" title="Editar nome/email">
                            <x-tabler-edit />
                        </button>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}"
                        readonly>
                </div>

                <button type="submit" class="btn btn-save mb-3" id="saveProfileBtn" style="display: none;">
                    Salvar Alterações
                </button>
            </form>

            <div class="divider"></div>

            <!-- FORM SENHA -->
            <form method="POST" action="{{ route('profile.reset-password') }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <div class="input-group">
                        <input type="password" class="form-control" value="••••••••" readonly>
                        <button class="btn btn-edit togglePasswordForm" type="button" title="Alterar senha">
                            <x-tabler-edit />
                        </button>
                    </div>
                </div>

                <div id="passwordFields" style="display: none;">
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="password" class="form-control" id="current_password" name="current_password"
                                placeholder="Senha atual" minlength="8" required>
                            <button class="btn btn-secondary toggle-password" type="button" data-target="current_password">
                                <span id="current_password_icon">🔒</span>
                            </button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Nova senha" minlength="8" required>
                            <button class="btn btn-secondary toggle-password" type="button" data-target="password">
                                <span id="password_icon">🔒</span>
                            </button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Confirmar nova senha" minlength="8" required>
                            <button class="btn btn-secondary toggle-password" type="button"
                                data-target="password_confirmation">
                                <span id="password_confirmation_icon">🔒</span>
                            </button>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div>
                            <button type="submit" class="btn btn-save">
                                Atualizar
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="mt-4">
                <div class="row g-2">
                    <div class="">
                        <form method="POST" action="{{ route('logout') }}" class="no-loading">
                            @csrf
                            <button type="submit" class="btn btn-success w-100 py-2 fw-bold">
                                Sair
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection