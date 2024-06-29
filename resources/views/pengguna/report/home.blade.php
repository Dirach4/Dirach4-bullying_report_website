<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengguna Report') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">List Report</h1>
                        <a href="{{ route('pengguna.reports.create') }}" class="btn btn-primary">Add Report</a>
                    </div>
                    <hr />
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Nama Pelapor</th>
                                <th>Jurusan</th>
                                <th>Program Studi</th>
                                <th>Kelas</th>
                                <th>No HP</th>
                                <th>Laporan Sebagai</th>
                                <th>Tanggal Kejadian</th>
                                <th>Bukti</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reports as $report)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $report->nama_pelapor }}</td>
                                <td class="align-middle">{{ $report->jurusan }}</td>
                                <td class="align-middle">{{ $report->program_studi }}</td>
                                <td class="align-middle">{{ $report->kelas }}</td>
                                <td class="align-middle">{{ $report->no_hp }}</td>
                                <td class="align-middle">{{ $report->lpr_sebagai }}</td>
                                <td class="align-middle">{{ $report->tgl_kejadian }}</td>
                                <td class="align-middle">
                                    @if ($report->bukti)
                                    <a href="{{ asset('bukti/' . $report->bukti) }}" target="_blank">View Bukti</a>
                                    @else
                                    <span>No Bukti</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('pengguna.reports.edit', ['id' => $report->id]) }}" type="button" class="btn btn-secondary">Edit</a>
                                        <form action="{{ route('pengguna.reports.delete', ['id' => $report->id]) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="10">Report not found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
