<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Report') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Edit Report</h1>
                    <hr />
                    <form action="{{ route('pengguna.reports.update', $report->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Nama Pelapor</label>
                                <input type="text" name="nama_pelapor" class="form-control" placeholder="Nama Pelapor" value="{{ $report->nama_pelapor }}">
                                @error('nama_pelapor')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Jurusan</label>
                                <input type="text" name="jurusan" class="form-control" placeholder="Jurusan" value="{{ $report->jurusan }}">
                                @error('jurusan')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Program Studi</label>
                                <input type="text" name="program_studi" class="form-control" placeholder="Program Studi" value="{{ $report->program_studi }}">
                                @error('program_studi')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Kelas</label>
                                <input type="text" name="kelas" class="form-control" placeholder="Kelas" value="{{ $report->kelas }}">
                                @error('kelas')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">No HP</label>
                                <input type="text" name="no_hp" class="form-control" placeholder="No HP" value="{{ $report->no_hp }}">
                                @error('no_hp')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Laporan Sebagai</label>
                                <input type="text" name="lpr_sebagai" class="form-control" placeholder="Laporan Sebagai" value="{{ $report->lpr_sebagai }}">
                                @error('lpr_sebagai')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Tanggal Kejadian</label>
                                <input type="date" name="tgl_kejadian" class="form-control" placeholder="Tanggal Kejadian" value="{{ $report->tgl_kejadian }}">
                                @error('tgl_kejadian')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Kronologi</label>
                                <textarea name="kronologi" class="form-control" placeholder="Kronologi">{{ $report->kronologi }}</textarea>
                                @error('kronologi')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Bentuk Kekerasan</label>
                                <input type="text" name="bentuk_kekerasan" class="form-control" placeholder="Bentuk Kekerasan" value="{{ $report->bentuk_kekerasan }}">
                                @error('bentuk_kekerasan')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Informasi Pelaku</label>
                                <textarea name="informasi_pelaku" class="form-control" placeholder="Informasi Pelaku">{{ $report->informasi_pelaku }}</textarea>
                                @error('informasi_pelaku')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Informasi Korban</label>
                                <textarea name="informasi_korban" class="form-control" placeholder="Informasi Korban">{{ $report->informasi_korban }}</textarea>
                                @error('informasi_korban')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Bukti</label>
                                <input type="file" name="bukti" class="form-control" placeholder="Bukti">
                                @if ($report->bukti)
                                <p>Current Bukti: <a href="{{ asset('bukti/' . $report->bukti) }}" target="_blank">View Bukti</a></p>
                                @endif
                                @error('bukti')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-warning">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
