<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;

class LaporanController extends Controller
{
    public function laporanindex()
    {
        $reports = Report::orderBy('id', 'desc')->get();
        $total = Report::count();
        return view('laporan.laporan',compact(['reports', 'total']));

    }

    public function bacalaporanindex($id)
{

    // Lakukan sesuatu dengan $id, misalnya ambil data dari database
    $reports = Report::with('user')->findOrFail($id);

    // Kirim data ke view 'bacalaporan'
    return view('laporan.bacalaporan', compact('reports'));
}


}
