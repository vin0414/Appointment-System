<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }} | {{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Optional: Tabler favicon -->
    <link rel="icon" href="{{ asset('assets/images/deped-gentri-logo.png') }}" type="image/x-icon" />
    <link href="{{ asset('assets/tabler/css/tabler.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.1/dist/dotlottie-wc.js" type="module"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <script src="{{ asset('assets/tabler/js/tabler-theme.min.js') }}" defer></script>
    <div class="page">
        <!-- Page Content -->
        <div class="page-wrapper">
            <div class="container-xl mt-4">
                @yield('content')
            </div>

            <!-- Footer -->
            <footer class="footer footer-transparent d-print-none">
                <div class="container">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            Built with ❤️ using Tabler UI
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Tabler JS is already bundled via Vite -->
    <script src="{{ asset('assets/tabler/js/tabler.min.js') }}" defer></script>
</body>

</html>