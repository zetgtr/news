<?php

namespace News\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => ['required', 'min:2'],
            'url' => ['required','min:2']
        ];
    }
    public function prepareForValidation()
    {
        if (!$this->input('url')) {
            $this->merge([
                'url' => str_slug($this->input('name'))
            ]);
        }
    }
}
