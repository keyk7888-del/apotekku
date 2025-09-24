<!doctype html>
<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr"
  data-theme="theme-default" data-assets-path="{{ asset('/') }}"
  data-template="vertical-menu-template" data-style="light">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>ApotekKu</title>

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('/img/favicon/favicon.ico') }}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
    rel="stylesheet" />

  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('/vendor/fonts/fontawesome.css') }}" />
  <link rel="stylesheet" href="{{ asset('/vendor/fonts/tabler-icons.css') }}" />
  <link rel="stylesheet" href="{{ asset('/vendor/fonts/flag-icons.css') }}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('/vendor/css/rtl/core.css') }}" />
  <link rel="stylesheet" href="{{ asset('/vendor/css/rtl/theme-default.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/demo.css') }}" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{ asset('/vendor/libs/node-waves/node-waves.css') }}" />
  <link rel="stylesheet" href="{{ asset('/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
  <link rel="stylesheet" href="{{ asset('/vendor/libs/typeahead-js/typeahead.css') }}" />

  <!-- Page CSS -->
  <link rel="stylesheet" href="{{ asset('/vendor/css/pages/page-auth.css') }}" />
</head>

<body>
  <!-- Navbar -->
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
        <ul class="navbar-nav d-flex flex-row fs-2 fw-semibold">
      <li class="nav-item me-4"><a class="nav-link" href="{{ url('/obat') }}">Obat Shop</a></li>
      <li class="nav-item me-4"><a class="nav-link" href="{{ url('/keranjang') }}">Keranjang Obat</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ url('/pesanan') }}">Pesananku</a></li>
    </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <!-- Content -->
  <div class="container-xxl">
    <div class="row justify-content-center py-5">
      <div class="col-md-7">
        <div class="card card-body">
          <h5 class="mb-0 fw-bold text-center">PELANGGAN</h5>
          <hr />

          <form action="{{ route('pelanggan.store') }}" method="post">
            @csrf

            <div class="form-group mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama"
                value="{{ old('nama') }}">
              @error('nama')
              <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="no_telp" class="form-label">No Telepone</label>
                  <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp"
                    name="no_telp" value="{{ old('no_telp') }}">
                  @error('no_telp')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    value="{{ old('email') }}">
                  @error('email')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>

            <div class="form-group mb-3">
              <label for="keperluan" class="form-label">Keperluan</label>
              <input type="text" class="form-control @error('keperluan') is-invalid @enderror" id="keperluan"
                name="keperluan" value="{{ old('keperluan') }}">
              @error('keperluan')
              <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-paper-plane me-2"></i> Kirim
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- / Content -->

  <!-- Core JS -->
  <script src="{{ asset('/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('/vendor/libs/node-waves/node-waves.js') }}"></script>
  <script src="{{ asset('/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('/vendor/libs/hammer/hammer.js') }}"></script>
  <script src="{{ asset('/vendor/libs/i18n/i18n.js') }}"></script>
  <script src="{{ asset('/vendor/libs/typeahead-js/typeahead.js') }}"></script>
  <script src="{{ asset('/vendor/js/menu.js') }}"></script>

  <!-- Main JS -->
  <script src="{{ asset('/js/main.js') }}"></script>
</body>
</html>
