<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="keywords"
        content="Performance Monitoring,IPCRF,General Trias City, School Division Office of General Trias">
    <meta name="description" content="Employee Performance Monitoring System of DepEd General Trias City,IPCRF System">
    <title>{{ $title ?? '' }} | {{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Optional: Tabler favicon -->
    <link rel="icon" href="{{ asset('assets/images/deped-gentri-logo.png') }}" type="image/x-icon" />
    <link href="{{ asset('assets/tabler/css/nouislider.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/tabler/css/tom-select.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/tabler/css/vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/tabler/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/tabler/css/tabler-themes.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/tabler/css/dropzone.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <style>
    @import url("https://rsms.me/inter/inter.css");

    .middle {
        vertical-align: middle;
    }
    </style>
    <script src="{{ asset('assets/tabler/js/nouislider.min.js') }}" defer></script>
    <script src="{{ asset('assets/tabler/js/litepicker.js') }}" defer></script>
    <script src="{{ asset('assets/tabler/js/tom-select.js') }}" defer></script>
    <script src="{{ asset('assets/tabler/js/tabler-theme.min.js') }}" defer></script>
    <script src="{{ asset('assets/tabler/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('assets/tabler/js/dirty-form.js') }}"></script>
    <script src="{{ asset('assets/tabler/js/dropzone.js')}}" defer></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.1/dist/dotlottie-wc.js" type="module"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
</head>

<body>
    <div class="page">
        <!--  BEGIN SIDEBAR  -->
        @include('components.sidebar')
        <!--  END SIDEBAR  -->
        <!-- BEGIN NAVBAR  -->
        @include('components.navbar')
        <!-- END NAVBAR  -->
        <!-- Page Content -->
        <div class="page-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementsByTagName('form');
        let isDirty = false;

        // Detect changes on all inputs
        form.querySelectorAll('input, textarea, select').forEach((el) => {
            el.addEventListener('change', () => {
                isDirty = true;
            });
            el.addEventListener('input', () => {
                isDirty = true;
            });
        });


        // Prevent accidental navigation
        window.addEventListener('beforeunload', function(e) {
            if (isDirty) {
                e.preventDefault();
                e.returnValue = ''; // Required for Chrome
            }
        });

        // If form is submitted, disable the warning
        form.addEventListener('submit', function() {
            isDirty = false;
        });
    });
    </script>
</body>

</html>