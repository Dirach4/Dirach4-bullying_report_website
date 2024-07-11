<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Exception;

class ApiReportController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $reports = Report::with('user')->where('user_id', $userId)->paginate(5);

        return response()->json([
            'reports' => $reports
        ], 200);
    }

    public function show($id)
    {
        $userId = auth()->id();
        $report = Report::with('user')->where('id', $id)->where('user_id', $userId)->first();

        if (!$report) {
            return response()->json([
                'message' => 'Report Not Found or Access Denied.'
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
            'bukti' => 'required|file|mimes:jpeg,png,jpg,gif,mp4,avi,mkv|max:30720',
        ]);

        try {
            $data = $request->only([
                'user_id', 'lpr_sebagai', 'tgl_kejadian',
                'kronologi', 'area_kejadian', 'bentuk_kekerasan', 'informasi_pelaku', 'informasi_korban'
            ]);

            if ($request->hasFile('bukti')) {
                $fileName = $request->file('bukti')->getClientOriginalName();
                $request->file('bukti')->storeAs('public/bukti', $fileName);
                $data['bukti'] = $fileName;
            }

            $data['status'] = 'masuk';

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
            'bukti' => 'sometimes|nullable|file|mimes:jpeg,png,jpg,gif,mp4,avi,mkv|max:30720',
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
                $fileName = $request->file('bukti')->getClientOriginalName();
                $request->file('bukti')->storeAs('public/bukti', $fileName);

                $storage = Storage::disk('public');
                if ($storage->exists('bukti/' . $report->bukti)) {
                    $storage->delete('bukti/' . $report->bukti);
                }

                $data['bukti'] = $fileName;
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

        if ($storage->exists('bukti/' . $report->bukti)) {
            $storage->delete('bukti/' . $report->bukti);
        }

        $report->delete();

        return response()->json([
            'message' => "Report successfully deleted."
        ], 200);
    }
}
