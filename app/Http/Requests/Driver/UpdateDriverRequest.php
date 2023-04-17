<?php

namespace App\Http\Requests\Driver;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDriverRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|min:14|max:14|unique:drivers,cpf,' . $this->driver->id,
            'cnh' => 'required|string|max:11|unique:drivers,cnh,' . $this->driver->id,
            'cnh_category' => 'required|string|max:1',
            'cnh_expiration_date' => 'required|date',
            'phone' => 'required|string|max:15|unique:drivers,phone,' . $this->driver->id,
            'email' => 'required|string|max:255|unique:drivers,email,' . $this->driver->id,
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
        ];
    }
}
