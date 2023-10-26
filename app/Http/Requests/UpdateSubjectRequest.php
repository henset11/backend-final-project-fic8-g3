<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubjectRequest extends FormRequest
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
            'title' => 'required|max:255|unique:subjects,title,' . $this->subject->id,
            'lecturer_id' => 'required|exists:users,id',
            'semester' => 'required|string',
            'academic_year' => 'required|string',
            'sks' => 'required|integer',
            'code' => 'required|unique:subjects,code,' . $this->subject->id,
            'description' => 'nullable|string',
        ];
    }
}
