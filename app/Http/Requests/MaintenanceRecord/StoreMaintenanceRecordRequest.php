<?php

namespace App\Http\Requests\MaintenanceRecord;

use Illuminate\Foundation\Http\FormRequest;

class StoreMaintenanceRecordRequest extends FormRequest
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
            'vehicle_id' => ['required', 'exists:vehicles,id'],
            'mechanic_id' => ['required', 'exists:mechanics,id'],
            'date' => ['required', 'date'],
            'description' => ['required', 'string'],
            'cost' => ['required', 'string'],
        ];
    }
}
