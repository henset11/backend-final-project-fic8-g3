<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreScheduleRequest extends FormRequest
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
            'subject_id' => 'required|exists:subjects,id',
            'student_id' => 'required|exists:users,id',
            'hari' => 'required|string',
            'jam_mulai' => 'required|string',
            'jam_selesai' => 'required|string',
            'ruangan' => 'required|string',
            'kode_absensi' => 'required|string',
            'tahun_akademik' => 'required|string',
            'semester' => 'required|string',
            'created_by' => 'required|exists:users,id',
            'updated_by' => 'required|exists:users,id',
        ];
    }
}
