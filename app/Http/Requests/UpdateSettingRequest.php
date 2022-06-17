<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'          => ['required', 'min:3', 'string', Rule::unique('settings')->ignore($this->setting->id)],
            'bio'           => 'required|min:10|string',
            'facebook'      => ['required', 'url', 'min:10'],
            'email'         => ['required', 'min:10', 'email'],
            'telegram'      => ['required', 'url', 'min:10'],
            'github'        => ['required', 'url', 'min:10'],
        ];
    }
}