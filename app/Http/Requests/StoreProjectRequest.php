<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => 'bail|required|min:5|max:50',
            'description' => 'bail|nullable|min:50|max:1000',
            'image' => 'bail|nullable|image|max:5000',
            'git_link' => 'bail|nullable|',
            'external_link' => 'bail|nullable|unique',
            'publication_date' => 'bail|nullable|date',
            'project_type' => 'bail|nullable|max:50'
        ];
    }
}
