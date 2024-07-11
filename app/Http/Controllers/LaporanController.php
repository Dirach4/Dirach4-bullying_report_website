<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class LaporanController extends Controller
{
    public function laporanindex(Request $request)
    {
        $status = $request->input('status');
        $search = $request->input('table_search');

        // Hitung jumlah total berdasarkan status
        $totalMasuk = Report::where('status', 'masuk')->count();
        $totalProses = Report::where('status', 'proses')->count();
        $totalSelesai = Report::where('status', 'selesai')->count();

        // Ambil data laporan dengan pencarian dan pagination
        $query = Report::query();

        if ($status) {
            $query->where('status', $status);
        }

        if ($search) {
            $query->where(function($query) use ($search) {
                $query->where('area_kejadian', 'like', "%{$search}%")
                      ->orWhere('bentuk_kekerasan', 'like', "%{$search}%")
                      ->orWhere('kronologi', 'like', "%{$search}%")
                      ->orWhereHas('user', function($q) use ($search) {
                          $q->where('name', 'like', "%{$search}%");
                      });
            });
        }

        $reports = $query->orderBy('id')->paginate(5);

        return view('laporan.laporan', compact(['reports', 'totalMasuk', 'totalProses', 'totalSelesai', 'search']));
    }

    public function bacalaporanindex($id)
    {
        $report = Report::with('user')->findOrFail($id);

        $totalMasuk = Report::where('status', 'masuk')->count();
        $totalProses = Report::where('status', 'proses')->count();
        $totalSelesai = Report::where('status', 'selesai')->count();

        return view('laporan.bacalaporan', compact('report', 'totalMasuk', 'totalProses', 'totalSelesai'));
    }


    public function prosesLaporan($id)
    {
        $report = Report::findOrFail($id);
        $report->status = 'proses';
        $report->save();

        return redirect()->back()->with('success', 'Laporan berhasil diproses.');
    }

    public function selesaiLaporan(Request $request, $id)
{
    $report = Report::findOrFail($id);

    if ($request->isMethod('post')) {
        $request->validate([
            'ket_hasil' => 'required|string|max:255',
        ]);

        $report->status = 'selesai';
        $report->ket_hasil = $request->input('ket_hasil');
        $report->save();

        return redirect()->back()->with('success', 'Laporan berhasil diselesaikan.');
    }

    return view('laporan.ket_hasil_form', compact('report'));
}

}