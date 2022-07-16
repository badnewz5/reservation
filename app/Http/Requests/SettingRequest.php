<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'name' => ['required'],
            'log' => ['required'],
            'contact' => ['required'],
            'address' => ['required'],
            'fax' => ['required'],
            'contact' => ['required'],
            'email' => ['required'],
            'about' => ['required'],
        ];
    }
}
