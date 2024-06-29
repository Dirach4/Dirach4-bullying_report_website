<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if (request()->isMethod('post')) {
            return [
                'nama_pelapor' => 'required|string|max:255',
                'jurusan' => 'required|string|max:255',
                'program_studi' => 'required|string|max:255',
                'kelas' => 'required|string|max:255',
                'no_hp' => 'required|string|max:20',
                'lpr_sebagai' => 'required|string|max:255',
                'tgl_kejadian' => 'required|date',
                'kronologi' => 'required|string',
                'bentuk_kekerasan' => 'required|string',
                'informasi_pelaku' => 'required|string',
                'informasi_korban' => 'required|string',
                'bukti' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
        } else {
            return [
                'nama_pelapor' => 'required|string|max:255',
                'jurusan' => 'required|string|max:255',
                'program_studi' => 'required|string|max:255',
                'kelas' => 'required|string|max:255',
                'no_hp' => 'required|string|max:20',
                'lpr_sebagai' => 'required|string|max:255',
                'tgl_kejadian' => 'required|date',
                'kronologi' => 'required|string',
                'bentuk_kekerasan' => 'required|string',
                'informasi_pelaku' => 'required|string',
                'informasi_korban' => 'required|string',
                'bukti' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
        }
    }

    public function messages()
    {
        if (request()->isMethod('post')) {
            return [
                'nama_pelapor.required' => 'Nama pelapor is required!',
                'jurusan.required' => 'Jurusan is required!',
                'program_studi.required' => 'Program studi is required!',
                'kelas.required' => 'Kelas is required!',
                'no_hp.required' => 'No HP is required!',
                'lpr_sebagai.required' => 'Laporan sebagai is required!',
                'tgl_kejadian.required' => 'Tanggal kejadian is required!',
                'kronologi.required' => 'Kronologi is required!',
                'bentuk_kekerasan.required' => 'Bentuk kekerasan is required!',
                'informasi_pelaku.required' => 'Informasi pelaku is required!',
                'informasi_korban.required' => 'Informasi korban is required!',
                'bukti.required' => 'Bukti is required!',
            ];
        } else {
            return [
                'nama_pelapor.required' => 'Nama pelapor is required!',
                'jurusan.required' => 'Jurusan is required!',
                'program_studi.required' => 'Program studi is required!',
                'kelas.required' => 'Kelas is required!',
                'no_hp.required' => 'No HP is required!',
                'lpr_sebagai.required' => 'Laporan sebagai is required!',
                'tgl_kejadian.required' => 'Tanggal kejadian is required!',
                'kronologi.required' => 'Kronologi is required!',
                'bentuk_kekerasan.required' => 'Bentuk kekerasan is required!',
                'informasi_pelaku.required' => 'Informasi pelaku is required!',
                'informasi_korban.required' => 'Informasi korban is required!',
            ];
        }
    }
}
