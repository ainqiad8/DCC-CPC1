<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'company_name' => 'required',
            'company_details' => 'required',
            'vacancy' => 'required',
            'description' => 'required',
            'short_experience_requirements' => 'required',
            'experience_requirements' => 'required',
            'educational_requirements' => 'required',
            'additional_requirements' => 'required',
            'job_location' => 'required',
            'salary' => 'required',
            'benefits' => 'required',
            'age' => 'required',
            'apply_instruction' => 'required',
            'apply_procedure' => 'required',
            'deadline' => 'required',
            'category_id' => 'required',
            'gender'=>'required',
            'experience_level'=>'required',
            'jobtypes'=>'required',
        ];
    }
}
