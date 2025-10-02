@extends('layouts.app') {{-- sesuaikan dengan layout utama kamu --}}

@section('content')
<div class="container-fluid py-4" style="background-color: #e3f2fd;">
    <div class="row">

        <!-- Hour chart  -->
        <div class="container-fluid px-4">
        <div class="row mb-4">
            <div class="col-12">
            <!-- Card Selamat Datang -->
            <div class="card shadow-sm border-0">
                <div class="card-body row g-4">
                
                <!-- Bagian Kiri -->
                <div class="col-lg-8 border-end">
                    <h4 class="mb-2">
                    Selamat Datang Di <span class="h4">ApotekKu 👋🏻</span>
                    </h4>
                    <p>Penjualan minggu ini sangat baik. Pertahankan kinerja agar semakin banyak pelanggan yang terlayani!</p>

                    <div class="d-flex flex-wrap gap-5">
                    
                    <!-- Jam Operasional -->
                    <div class="d-flex align-items-center gap-3">
                        <div class="avatar avatar-lg bg-label-primary rounded d-flex align-items-center justify-content-center">
                        <img src="/assets/svg/icons/laptop.svg" alt="Jam Operasional" class="img-fluid" style="width:28px; height:28px;">
                        </div>
                        <div>
                        <p class="mb-0 fw-medium">Jam Operasional ⏱️</p>
                        <h4 class="text-primary mb-0">34 jam</h4>
                        </div>
                    </div>

                    <!-- Obat Terjual -->
                    <div class="d-flex align-items-center gap-3">
                        <div class="avatar avatar-lg bg-label-info rounded d-flex align-items-center justify-content-center">
                        <img src="/assets/svg/icons/lightbulb.svg" alt="Obat Terjual" class="img-fluid" style="width:28px; height:28px;">
                        </div>
                        <div>
                        <p class="mb-0 fw-medium">Obat Terjual</p>
                        <h4 class="text-info mb-0">82%</h4>
                        </div>
                    </div>

                    <!-- Pesanan Selesai -->
                    <div class="d-flex align-items-center gap-3">
                        <div class="avatar avatar-lg bg-label-warning rounded d-flex align-items-center justify-content-center">
                        <img src="/assets/svg/icons/check.svg" alt="Pesanan Selesai" class="img-fluid" style="width:28px; height:28px;">
                        </div>
                        <div>
                        <p class="mb-0 fw-medium">Pesanan Selesai</p>
                        <h4 class="text-warning mb-0">14</h4>
                        </div>
                    </div>

                    </div>
                </div>

                <!-- Bagian Kanan -->
                <div class="col-lg-4 ps-lg-4">
                    <h5 class="mb-1">Aktivitas Apotek</h5>
                    <p class="mb-3">Data Mingguan</p>
                    <h4 class="mb-2">231<span class="text-body">h</span> 14<span class="text-body">m</span></h4>
                    <span class="badge bg-label-success">+18.4%</span>
                </div>

                </div>
            </div>
            </div>
        </div>

<br><br><br><br>
              <!-- Hour chart End  -->

       <div class="row g-4 mt-2">

  <!-- Baris 1 -->
  <div class="col-md-4">
    <div class="card shadow-sm border-0 text-center py-4">
      <h5 class="mb-2 fs-5">Total Admin</h5>
      <h3 class="fw-bold text-primary">2</h3>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card shadow-sm border-0 text-center py-4">
      <h5 class="mb-2 fs-5">Total Obat</h5>
      <h3 class="fw-bold text-success">10</h3>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card shadow-sm border-0 text-center py-4">
      <h5 class="mb-2 fs-5">Total Supplier</h5>
      <h3 class="fw-bold text-info">10</h3>
    </div>
  </div>

  <!-- Baris 2 -->
  <div class="col-md-6">
    <div class="card shadow-sm border-0 text-center py-4">
      <h5 class="mb-2 fs-5">Total Pelanggan</h5>
      <h3 class="fw-bold text-warning">25</h3>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card shadow-sm border-0 text-center py-4">
      <h5 class="mb-2 fs-5">Total Kategori</h5>
      <h3 class="fw-bold text-danger">10</h3>
    </div>
  </div>

</div>

    <br><br>

</div>
@endsection

