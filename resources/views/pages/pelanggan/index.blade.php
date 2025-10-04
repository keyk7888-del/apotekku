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

  <style>
    body {
      background: url('{{ asset("images/bg.apotek.png") }}') no-repeat center center fixed;
      background-size: cover;
    }
    .card {
      background-color: #3498db !important; /* Biru */
      color: white;
      border-radius: 12px;
    }
    .form-label {
      color: white;
    }
    .form-control {
      background-color: #ffffff !important; /* putih bersih */
      color: #000; /* teks hitam agar jelas */
      border: 1px solid #ccc;
      transition: box-shadow 0.2s ease, border-color 0.2s ease;
    }

    .form-control:focus {
      background-color: #ffffff !important; /* tetap putih meski diklik */
      color: #000; /* teks tetap hitam */
      border-color: #ffffff; /* efek fokus biru */
      box-shadow: 0 0 5px rgb(255, 255, 255); /* glow biru lembut */
    }
    .btn-primary {
      background-color: #6b5b67;
      border: none;
    }
    .btn-primary:hover {
      background-color: #6b5b67;
    }
  </style>
</head>

<body>
  <!-- Content -->
  <div class="container-xxl min-vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100 justify-content-center">
      <div class="col-md-7">
        <div class="card card-body shadow-lg">
          <h5 class="mb-0 text-white text-center">SELAMAT DATANG DI APOTEKKU🤍</h5>
          <h6 class="mb-0 text-white text-center">Silahkan Isi Data Pelanggan Untuk Melihat ApotekKu!</h6>
          <hr class="border-light"/>

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
</body>
</html>
