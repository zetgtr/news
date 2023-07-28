<?php

namespace News\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
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
            'id' => ['required'],
            'title' => ['nullable'],
            'url' => ['required'],
            'seoKeywords' => ['nullable', 'string'],
            'seoTitle' => ['nullable','string'],
            'seoDescription' => ['nullable', 'string'],
        ];
    }
}
