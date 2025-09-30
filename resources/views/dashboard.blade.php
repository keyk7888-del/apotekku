@extends('layouts.app') {{-- sesuaikan dengan layout utama kamu --}}

@section('content')
<div class="container-fluid py-4" style="background-color: #e3f2fd;">
    <div class="row">
        <!-- Card Total Admin -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0 rounded-3" style="background: #bbdefb;">
                <div class="card-body text-center">
                    <h6 class="fw-bold">Total Admin</h6>
                    <h4>{{ $totalAdmin }}</h4>
                </div>
            </div>
        </div>

        <!-- Card Total Obat -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0 rounded-3" style="background: #90caf9;">
                <div class="card-body text-center">
                    <h6 class="fw-bold">Total Obat</h6>
                    <h4>{{ $totalObat }}</h4>
                </div>
            </div>
        </div>

        <!-- Card Total Kategori -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0 rounded-3" style="background: #64b5f6;">
                <div class="card-body text-center">
                    <h6 class="fw-bold">Total Kategori</h6>
                    <h4>{{ $totalCategory }}</h4>
                </div>
            </div>
        </div>

        <!-- Card Total Supplier -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0 rounded-3" style="background: #42a5f5; color:white;">
                <div class="card-body text-center">
                    <h6 class="fw-bold">Total Supplier</h6>
                    <h4>{{ $totalSupplier }}</h4>
                </div>
            </div>
        </div>

        <!-- Card Total Pelanggan -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0 rounded-3" style="background: #1565c0; color:white;">
                <div class="card-body text-center">
                    <h6 class="fw-bold">Total Pelanggan</h6>
                    <h4>{{ $totalPelanggan }}</h4>
                </div>
            </div>
        </div>
    </div>
    <br><br>

    <!-- Grafik Pesanan -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h5 class="fw-bold">Grafik Pesanan Bulanan</h5>
                    <canvas id="pesananChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pesanan Terbaru -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h5 class="fw-bold">Pesanan Terbaru</h5>
                    <table class="table table-bordered table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Obat</th>
                                <th>Total</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- isi data pesanan terbaru di sini --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ChartJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('pesananChart');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($bulan) !!},
            datasets: [{
                label: 'Total Pesanan',
                data: {!! json_encode($jumlah) !!},
                borderWidth: 1,
                backgroundColor: '#2196f3'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
