<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Exception;

class ApiReportController extends Controller
{
    public function index()
    {
        $reports = Report::with('user')->paginate(5); // Mengambil laporan beserta informasi pengguna terkait

        return response()->json([
            'reports' => $reports
        ], 200);
    }
    public function show($id)
    {
        $report = Report::with('user')->find($id); // Mengambil laporan beserta informasi pengguna terkait
        if (!$report) {
            return response()->json([
                'message' => 'Report Not Found.'
            ], 404);
        }

        return response()->json([
            'report' => $report
        ], 200);
    }
    

    public function store(Request $request)
{
    $request->validate([
        'user_id' => ['required', 'exists:users,id'],
        'lpr_sebagai' => 'required|string|max:255',
        'tgl_kejadian' => 'required|date',
        'kronologi' => 'required|string',
        'area_kejadian' => 'required|string',
        'bentuk_kekerasan' => 'required|string',
        'informasi_pelaku' => 'required|string',
        'informasi_korban' => 'required|string',
        'bukti' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    try {
        $data = $request->only([
            'user_id', 'lpr_sebagai', 'tgl_kejadian',
            'kronologi', 'area_kejadian', 'bentuk_kekerasan', 'informasi_pelaku', 'informasi_korban'
        ]);

        if ($request->hasFile('bukti')) {
            $imageName = $request->file('bukti')->getClientOriginalName();
            $request->file('bukti')->storeAs('public/bukti', $imageName);

            $data['bukti'] = $imageName;
        }

        Report::create($data);

        return response()->json([
            'message' => "Report successfully created."
        ], 200);
    } catch (Exception $e) {
        Log::error('Error creating report: ' . $e->getMessage());

        return response()->json([
            'message' => "Something went wrong while creating report. Please try again later."
        ], 500);
    }
}


    

public function update(Request $request, $id)
{
    $request->validate([
        'user_id' => ['required', 'exists:users,id'],
        'lpr_sebagai' => 'required|string|max:255',
        'tgl_kejadian' => 'required|date',
        'kronologi' => 'required|string',
        'area_kejadian' => 'required|string',
        'bentuk_kekerasan' => 'required|string',
        'informasi_pelaku' => 'required|string',
        'informasi_korban' => 'required|string',
        'bukti' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    try {
        $report = Report::find($id);
        if (!$report) {
            return response()->json([
                'message' => 'Report Not Found.'
            ], 404);
        }

        $data = $request->only([
            'user_id', 'lpr_sebagai', 'tgl_kejadian',
            'kronologi', 'area_kejadian', 'bentuk_kekerasan', 'informasi_pelaku', 'informasi_korban'
        ]);

        if ($request->hasFile('bukti')) {
            $imageName = $request->file('bukti')->getClientOriginalName();
            $request->file('bukti')->storeAs('public', $imageName); // Simpan file dengan nama asli

            $storage = Storage::disk('public');
            if ($storage->exists($report->bukti)) {
                $storage->delete($report->bukti);
            }

            $data['bukti'] = $imageName;
        }

        $report->update($data);

        return response()->json([
            'message' => "Report successfully updated."
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'message' => "Something went wrong while updating report."
        ], 500);
    }
}

    public function destroy($id)
    {
        $report = Report::find($id);
        if (!$report) {
            return response()->json([
                'message' => 'Report Not Found.'
            ], 404);
        }

        $storage = Storage::disk('public');

        if ($storage->exists($report->bukti)) {
            $storage->delete($report->bukti);
        }

        $report->delete();

        return response()->json([
            'message' => "Report successfully deleted."
        ], 200);
    }
}
