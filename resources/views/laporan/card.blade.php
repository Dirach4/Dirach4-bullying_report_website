<div class="card">
    <div class="card-header">
        <h3 class="card-title">Folders</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body p-0">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a href="{{ route('laporan.index', ['status' => 'masuk']) }}" class="nav-link">
                    <i class="fas fa-inbox"></i> Masuk
                    <span class="badge bg-primary float-right">{{ $totalMasuk }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('laporan.index', ['status' => 'proses']) }}" class="nav-link">
                    <i class="far fa-file-alt"></i> Dalam Proses
                    <span class="badge bg-warning float-right">{{ $totalProses }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('laporan.index', ['status' => 'selesai']) }}" class="nav-link">
                    <i class="fas fa-check"></i> Selesai
                    <span class="badge bg-success float-right">{{ $totalSelesai }}</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.card-body -->
</div>
