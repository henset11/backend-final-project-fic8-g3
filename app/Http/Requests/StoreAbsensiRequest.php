<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAbsensiRequest extends FormRequest
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
            'created_by' => 'required|exists:users,id',
            'updated_by' => 'required|exists:users,id',
        ];

       
       
    }
}
