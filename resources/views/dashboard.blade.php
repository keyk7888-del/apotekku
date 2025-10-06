@extends('layouts.app')

@section('content')
<style>
    body {
        background: url('{{ asset('images/admin.png') }}') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Poppins', sans-serif;
    }

    /* container utama */
    .dashboard-container {
        background: rgba(255, 255, 255, 0.7); /* ⬆️ opacity dinaikkan dari 0.25 → 0.7 */
        backdrop-filter: blur(6px);
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.15);
    }

    /* card */
    .card {
        background: rgba(255, 255, 255, 0.8) !important; /* ⬆️ dari 0.25 → 0.8 agar lebih solid */
        backdrop-filter: blur(5px);
        border: none !important;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.15);
    }

    h4, h5, p { color: #1e293b; }

    .text-primary { color: #003566 !important; }
    .text-success { color: #007f5f !important; }
    .text-info { color: #0096c7 !important; }
    .text-warning { color: #f48c06 !important; }
    .text-danger { color: #d00000 !important; }

    .avatar {
        width: 55px;
        height: 55px;
        background: rgba(255, 255, 255, 0.65); /* ⬆️ lebih solid */
        backdrop-filter: blur(5px);
        border-radius: 12px;
    }

    .badge.bg-label-success {
        background: rgba(25, 135, 84, 0.25); /* ⬆️ lebih tegas */
        color: #198754;
        border-radius: 8px;
        font-weight: 500;
    }

    h4 span.h4 {
        color: #004f8c;
        font-weight: 700;
    }

    /* chart */
    #produkTerjualChart {
        width: 100%;
        height: 380px;
    }
</style>

<div class="container-fluid py-4">
    <div class="dashboard-container">

        <!-- Bagian Header -->
        <div class="container-fluid px-4">
            <div class="row mb-4">
                <div class="col-12">
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
                                        <div class="avatar d-flex align-items-center justify-content-center">
                                            <img src="/assets/svg/icons/laptop.svg" alt="Jam Operasional" class="img-fluid" style="width:28px; height:28px;">
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-medium">Jam Operasional ⏱️</p>
                                            <h4 class="text-primary mb-0">34 jam</h4>
                                        </div>
                                    </div>

                                    <!-- Obat Terjual -->
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="avatar d-flex align-items-center justify-content-center">
                                            <img src="/assets/svg/icons/lightbulb.svg" alt="Obat Terjual" class="img-fluid" style="width:28px; height:28px;">
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-medium">Obat Terjual</p>
                                            <h4 class="text-info mb-0">82%</h4>
                                        </div>
                                    </div>

                                    <!-- Pesanan Selesai -->
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="avatar d-flex align-items-center justify-content-center">
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
        </div>

        <!-- Statistik -->
        <div class="row g-4 mt-2">
            <div class="col-md-4">
                <div class="card text-center py-4">
                    <h5 class="mb-2 fs-5">Total Admin</h5>
                    <h3 class="fw-bold text-primary">{{ $totalAdmin }}</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center py-4">
                    <h5 class="mb-2 fs-5">Total Obat</h5>
                    <h3 class="fw-bold text-success">{{ $totalObat }}</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center py-4">
                    <h5 class="mb-2 fs-5">Total Supplier</h5>
                    <h3 class="fw-bold text-info">{{ $totalSupplier }}</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-center py-4">
                    <h5 class="mb-2 fs-5">Total Pelanggan</h5>
                    <h3 class="fw-bold text-warning">{{ $totalPelanggan }}</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-center py-4">
                    <h5 class="mb-2 fs-5">Total Kategori</h5>
                    <h3 class="fw-bold text-danger">{{ $totalCategory }}</h3>
                </div>
            </div>
        </div>

        <!-- 📊 Diagram Batang Produk Terjual -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card p-4">
                    <h5 class="text-center mb-4 fw-semibold"></h5>
                    <canvas id="produkTerjualChart"></canvas>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Script Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('produkTerjualChart').getContext('2d');
    const produkTerjualChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($labels), // ✅ pakai variabel dari controller
            datasets: [{
                label: 'Jumlah Terjual',
                data: @json($data), // ✅ data dari controller
                backgroundColor: [
                    'rgba(0, 53, 102, 0.7)',
                    'rgba(0, 127, 95, 0.7)',
                    'rgba(0, 150, 199, 0.7)',
                    'rgba(244, 140, 6, 0.7)',
                    'rgba(208, 0, 0, 0.7)',
                    'rgba(100, 100, 255, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(201, 203, 207, 0.7)'
                ],
                borderRadius: 10
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'Grafik Penjualan Produk',
                    color: '#003566',
                    font: { size: 18, weight: 'bold' }
                }
            },
            scales: {
                x: {
                    ticks: { color: '#1e293b', font: { size: 13 } }
                },
                y: {
                    beginAtZero: true,
                    ticks: { color: '#1e293b', font: { size: 13 } }
                }
            }
        }
    });
</script>
@endsection
