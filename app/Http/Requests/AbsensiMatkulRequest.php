<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbsensiMatkulRequest extends FormRequest
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
        return [
            'schedule_id' => 'required|exists:schedules,id',
            'student_id' => 'required|exists:users,id',
            'kode_absensi' => 'required',
            'tahun_akademik' => 'required',
            'semester' => 'required',
            'pertemuan' => 'required',
            'status' => 'required',
            'keterangan' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'nilai' => 'required',
        ];
    }
}
