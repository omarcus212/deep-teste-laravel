<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Meu App')</title>
    <link href="{{ asset('css/user/loading.css') }}" rel="stylesheet">

    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('js/user/loading.js') }}" defer></script>
</head>

<body class="w-screen h-screen bg-white no-scrollbar-x">

    <div id="loading-overlay" class="loading-overlay">
        <div class="loading-spinner">
            <div class="spinner"></div>
        </div>
    </div>

    {{-- Conteúdo da página --}}
    <main class="w-screen h-screen">
        @yield('content')
    </main>

    {{-- SweetAlert --}}
    @if (session('success'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true,
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true,
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            if (window.loading) {
                window.loading.hide();
            }

            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true,
            });
        </script>
    @endif

    @if (session('status'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: '{{ session('status') }}',
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true,
            });
        </script>
    @endif

    @if (session('info'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'info',
                title: '{{ session('info') }}',
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true,
            });
        </script>
    @endif

</body>

</html>