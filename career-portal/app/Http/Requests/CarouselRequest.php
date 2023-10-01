<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarouselRequest extends FormRequest
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
        if ($this->method() == 'PUT') {
            return [
                'caption' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048|dimensions:width=1500,height=600',
            ];
        }
        return [

            'caption' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048|dimensions:width=1500,height=600',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages()
    {
        return [
            'caption.required' => 'Caption is required',
            'image.required' => 'Image is required',
            'image.image' => 'Image must be an image',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif,webp, svg.',
            'image.max' => 'Image must be a file of size max: 2048 kb.',
            'image.dimensions' => 'Image must be 1500 x 600 pixels',
        ];
    }
}
