<x-app-layout>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <!-- Bisa tambahkan konten di sini jika diperlukan -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $totalUsers }}</h3>
                        <p>Total Pengguna</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user mr-2"></i>
                    </div>
                    <a href="{{ route('user') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $totalMasuk }}<sup style="font-size: 20px"></sup></h3>
                        <p>Laporan Masuk</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-inbox"></i>
                    </div>
                    <a href="{{ route('laporan.index', ['status' => 'masuk']) }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $totalProses }}</h3>
                        <p>Laporan Proses</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-file-alt"></i>
                    </div>
                    <a href="{{ route('laporan.index', ['status' => 'proses']) }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $totalSelesai }}</h3>
                        <p>Laporan Sukses</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <a href="{{ route('laporan.index', ['status' => 'selesai']) }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</x-app-layout>
