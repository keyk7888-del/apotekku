<!doctype html>
<html lang="en"
      class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
      dir="ltr"
      data-theme="theme-default"
      data-assets-path="{{ asset('') }}"
      data-template="vertical-menu-template"
      data-style="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title', 'Dashboard') | Aplikasi ApotekKu</title>
    <meta name="description" content="Aplikasi Manajemen ApotekKu" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon/favicon.ico') }}" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/typeahead-js/typeahead.css') }}" />

    <!-- Config -->
    <script src="{{ asset('js/config.js') }}"></script>

    <!-- 🌈 Custom Transparent Theme -->
    <style>
        body {
            background: url('{{ asset('images/admin.png') }}') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            color: #002b5b;
        }

        /* Kontainer utama */
        .layout-container {
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            margin: 20px;
            padding: 15px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.08);
        }

        /* Sidebar transparan */
        .layout-menu {
            background: rgba(255, 255, 255, 0.35) !important;
            backdrop-filter: blur(12px);
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
        }

        /* Navbar transparan */
        .layout-navbar {
            background: rgba(255, 255, 255, 0.35) !important;
            backdrop-filter: blur(12px);
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* Footer transparan */
        .content-footer {
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(8px);
            border-radius: 15px;
            padding: 10px;
        }

        /* Tombol utama */
        .btn-primary {
            background-color: #003566;
            border: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Badge */
        .badge {
            border-radius: 10px;
            font-size: 12px;
            background-color: #0096c7;
            color: white;
        }

        /* Heading */
        h2, h3, h4, h5 {
            color: #004f8c;
            font-weight: 700;
        }

        /* Transisi lembut */
        * {
            transition: all 0.3s ease-in-out;
        }

        /* Responsif kecil */
        @media (max-width: 768px) {
            .layout-container {
                margin: 10px;
                padding: 10px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Sidebar -->
            @include('layouts.inc.sidebar')
            <!-- / Sidebar -->

            <!-- Layout page -->
            <div class="layout-page">

                <!-- Navbar -->
                @include('layouts.inc.navbar')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    @include('layouts.inc.footer')
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- / Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('vendor/js/menu.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('js/main.js') }}"></script>
    @stack('scripts')

    <!-- Script Logout -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // cari semua tombol logout yang ada
        document.querySelectorAll('.btn-logout').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                // tampilkan loading singkat
                button.innerHTML = '<span>Logging out...</span>';
                button.disabled = true;

                // kirim form logout setelah 0.5 detik
                setTimeout(() => {
                    document.getElementById('logout-form').submit();
                }, 500);
            });
        });
    });
    </script>
</body>
</html>
