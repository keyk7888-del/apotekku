<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title') | ApotekKu</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- Navbar Frontend -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">

      <!-- Logo + Brand -->
      <!-- Logo + Brand -->
    <a class="navbar-brand d-flex align-items-center fs-3 fw-bold" href="{{ url('/') }}">
      <img src="{{ asset('images/logo.apotek.png') }}" alt="Logo" width="55" height="55" class="me-3">
      ApotekKu
    </a>


      <!-- Menu -->
      <div class="collapse navbar-collapse show" id="navbarNav">
        <ul class="navbar-nav d-flex flex-row fs-4 fw-semibold">
      <li class="nav-item me-4"><a class="nav-link" href="{{ url('/obatshop') }}">Obat Shop</a></li>
      <li class="nav-item me-4"><a class="nav-link" href="{{ url('/keranjang') }}">Keranjang Obat</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ url('/pesanan') }}">Pesananku</a></li>
    </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <main class="py-4">
    @yield('content')
  </main>

  <footer class="bg-light text-center py-3 border-top mt-5">
    <small>Hak Cipta © {{ date('Y') }} ApotekKu</small>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
