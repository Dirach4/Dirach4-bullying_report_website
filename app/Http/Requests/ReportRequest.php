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
                'user_id' => ['required', 'exists:users,id'],
            'lpr_sebagai' => 'required|string|max:255',
            'tgl_kejadian' => 'required|date',
            'kronologi' => 'required|string',
            'area_kejadian'=>'required|string',
            'bentuk_kekerasan' => 'required|string',
            'informasi_pelaku' => 'required|string',
            'informasi_korban' => 'required|string',
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ];
        } else {
            return [
            'user_id' => ['required', 'exists:users,id'],
            'lpr_sebagai' => 'required|string|max:255',
            'tgl_kejadian' => 'required|date',
            'kronologi' => 'required|string',
            'area_kejadian'=>'required|string',
            'bentuk_kekerasan' => 'required|string',
            'informasi_pelaku' => 'required|string',
            'informasi_korban' => 'required|string',
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ];
        }
    }

    public function messages()
{
    return [
        'user_id.required' => 'User ID is required!',
        'user_id.exists' => 'User ID does not exist in the database!',
        'lpr_sebagai.required' => 'Report type is required!',
        'lpr_sebagai.string' => 'Report type must be a string!',
        'lpr_sebagai.max' => 'Report type may not be greater than :max characters!',
        'tgl_kejadian.required' => 'Incident date is required!',
        'tgl_kejadian.date' => 'Incident date must be a valid date!',
        'kronologi.required' => 'Chronology is required!',
        'area_kejadian.required' => 'Incident area is required!',
        'bentuk_kekerasan.required' => 'Form of violence is required!',
        'informasi_pelaku.required' => 'Perpetrator information is required!',
        'informasi_korban.required' => 'Victim information is required!',
        'bukti.required' => 'Evidence is required!',
        'bukti.image' => 'Evidence must be an image file!',
        'bukti.mimes' => 'Evidence must be of type: jpeg, png, jpg, gif!',
        'bukti.max' => 'Evidence may not be larger than :max kilobytes!',
    ];
}

}
