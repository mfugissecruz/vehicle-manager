<?php

namespace App\Http\Requests\Vehicle;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleRequest extends FormRequest
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
            'model' => 'required|string',
            'year' => 'required|string',
            'make' => 'required|string',
            'plate_number' => 'required|string|unique:vehicles,plate_number,' . $this->vehicle->id,
            'chassis_number' => 'required|string|unique:vehicles,chassis_number,' . $this->vehicle->id,
            'engine_number' => 'required|string|unique:vehicles,engine_number,' . $this->vehicle->id,
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ];
    }
}
