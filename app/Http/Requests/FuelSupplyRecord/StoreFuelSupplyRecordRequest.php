<?php

namespace App\Http\Requests\FuelSupplyRecord;

use Illuminate\Foundation\Http\FormRequest;

class StoreFuelSupplyRecordRequest extends FormRequest
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
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'required|exists:drivers,id',
            'date' => 'required|date',
            'fuel_type' => 'required',
            'fuel_quantity' => 'required|numeric',
            'mileage' => 'required|numeric',
        ];
    }
}
