<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\File;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::orderBy('id', 'desc')->get();
        $total = Report::count();
        return view('pengguna.report.home', compact(['reports', 'total']));
    }

    public function create()
    {
        return view('pengguna.report.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'nama_pelapor' => 'required',
            'jurusan' => 'required',
            'program_studi' => 'required',
            'kelas' => 'required',
            'no_hp' => 'required',
            'lpr_sebagai' => 'required',
            'tgl_kejadian' => 'required|date',
            'kronologi' => 'required',
            'bentuk_kekerasan' => 'required',
            'informasi_pelaku' => 'required',
            'informasi_korban' => 'required',
            'bukti' => 'nullable|file|mimes:jpeg,png,jpg,gif,pdf,doc,docx|max:2048',
        ]);

        $report = new Report;
        $report->fill($request->except('bukti'));

        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('bukti'), $file_name);
            $report->bukti = $file_name;
        }

        if ($report->save()) {
            session()->flash('success', 'Report Added Successfully');
            return redirect()->route('pengguna/reports');
        } else {
            session()->flash('error', 'Some problem occurred');
            return redirect()->route('pengguna.reports.create');
        }
    }

    public function edit($id)
    {
        $report = Report::findOrFail($id);
        return view('pengguna.report.update', compact('report'));
    }

    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);

        $request->validate([
            'nama_pelapor' => 'required',
            'jurusan' => 'required',
            'program_studi' => 'required',
            'kelas' => 'required',
            'no_hp' => 'required',
            'lpr_sebagai' => 'required',
            'tgl_kejadian' => 'required|date',
            'kronologi' => 'required',
            'bentuk_kekerasan' => 'required',
            'informasi_pelaku' => 'required',
            'informasi_korban' => 'required',
            'bukti' => 'nullable|file|mimes:jpeg,png,jpg,gif,pdf,doc,docx|max:2048',
        ]);

        $report->fill($request->except('bukti'));

        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('bukti'), $file_name);
            
            if (!is_null($report->bukti)) {
                $oldFile = public_path('bukti/' . $report->bukti);
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }
            $report->bukti = $file_name;
        }

        if ($report->save()) {
            session()->flash('success', 'Report Updated Successfully');
            return redirect()->route('pengguna/reports');
        } else {
            session()->flash('error', 'Some problem occurred');
            return redirect()->route('pengguna.reports.update', $id);
        }
    }

    public function delete($id)
    {
        $report = Report::findOrFail($id);
        if (!is_null($report->bukti)) {
            $file = public_path('bukti/' . $report->bukti);
            if (File::exists($file)) {
                unlink($file);
            }
        }

        if ($report->delete()) {
            session()->flash('success', 'Report Deleted Successfully');
        } else {
            session()->flash('error', 'Report Not Deleted Successfully');
        }

        return redirect()->route('pengguna/reports');
    }
}
