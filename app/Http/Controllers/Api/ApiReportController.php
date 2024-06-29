<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ApiReportController extends Controller
{
    public function index()
    {
        $reports = Report::paginate(5);

        return response()->json([
            'reports' => $reports
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'program_studi' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'lpr_sebagai' => 'required|string|max:255',
            'tgl_kejadian' => 'required|date',
            'kronologi' => 'required|string',
            'bentuk_kekerasan' => 'required|string',
            'informasi_pelaku' => 'nullable|string',
            'informasi_korban' => 'nullable|string',
            'bukti' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $data = $request->only([
                'nama_pelapor', 'jurusan', 'program_studi', 'kelas', 'no_hp', 'lpr_sebagai', 'tgl_kejadian', 
                'kronologi', 'bentuk_kekerasan', 'informasi_pelaku', 'informasi_korban'
            ]);

            if ($request->hasFile('bukti')) {
                $imageName = Str::random(32) . "." . $request->bukti->getClientOriginalExtension();
                Storage::disk('public')->put($imageName, file_get_contents($request->bukti));
                $data['bukti'] = $imageName;
            }

            Report::create($data);

            return response()->json([
                'results' => "Report successfully created."
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong!"
            ], 500);
        }
    }

    public function show($id)
    {
        $report = Report::find($id);
        if (!$report) {
            return response()->json([
                'message' => 'Report Not Found.'
            ], 404);
        }

        return response()->json([
            'report' => $report
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'program_studi' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'lpr_sebagai' => 'required|string|max:255',
            'tgl_kejadian' => 'required|date',
            'kronologi' => 'required|string',
            'bentuk_kekerasan' => 'required|string',
            'informasi_pelaku' => 'nullable|string',
            'informasi_korban' => 'nullable|string',
            'bukti' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $report = Report::find($id);
            if (!$report) {
                return response()->json([
                    'message' => 'Report Not Found.'
                ], 404);
            }

            $data = $request->only([
                'nama_pelapor', 'jurusan', 'program_studi', 'kelas', 'no_hp', 'lpr_sebagai', 'tgl_kejadian', 
                'kronologi', 'bentuk_kekerasan', 'informasi_pelaku', 'informasi_korban'
            ]);

            if ($request->hasFile('bukti')) {
                $storage = Storage::disk('public');

                if ($storage->exists($report->bukti)) {
                    $storage->delete($report->bukti);
                }

                $imageName = Str::random(32) . "." . $request->bukti->getClientOriginalExtension();
                $data['bukti'] = $imageName;

                $storage->put($imageName, file_get_contents($request->bukti));
            }

            $report->update($data);

            return response()->json([
                'message' => "Report successfully updated."
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong!"
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
