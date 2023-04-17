<?php

namespace App\Http\Requests\Mechanic;

use Illuminate\Foundation\Http\FormRequest;

class StoreMechanicRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15', 'unique:mechanics'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:mechanics'],
        ];
    }
}
