<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Report') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Add Report</h1>
                    <hr />
                    @if (session()->has('error'))
                    <div>
                        {{session('error')}}
                    </div>
                    @endif
                    <p><a href="{{ route('pengguna/reports') }}" class="btn btn-primary">Go Back</a></p>
 
                    <form action="{{ route('pengguna.reports.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="nama_pelapor" class="form-control" placeholder="Nama Pelapor">
                                @error('nama_pelapor')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="jurusan" class="form-control" placeholder="Jurusan">
                                @error('jurusan')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="program_studi" class="form-control" placeholder="Program Studi">
                                @error('program_studi')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="kelas" class="form-control" placeholder="Kelas">
                                @error('kelas')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="no_hp" class="form-control" placeholder="No HP">
                                @error('no_hp')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="lpr_sebagai" class="form-control" placeholder="Laporan Sebagai">
                                @error('lpr_sebagai')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="date" name="tgl_kejadian" class="form-control" placeholder="Tanggal Kejadian">
                                @error('tgl_kejadian')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <textarea name="kronologi" class="form-control" placeholder="Kronologi"></textarea>
                                @error('kronologi')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="bentuk_kekerasan" class="form-control" placeholder="Bentuk Kekerasan">
                                @error('bentuk_kekerasan')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <textarea name="informasi_pelaku" class="form-control" placeholder="Informasi Pelaku"></textarea>
                                @error('informasi_pelaku')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <textarea name="informasi_korban" class="form-control" placeholder="Informasi Korban"></textarea>
                                @error('informasi_korban')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="file" name="bukti" class="form-control" placeholder="Bukti">
                                @error('bukti')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
 
                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
