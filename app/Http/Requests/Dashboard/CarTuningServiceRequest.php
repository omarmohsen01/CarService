<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CarTuningServiceRequest extends FormRequest
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
            'name'=>'sometimes|required|string|min:3|max:255',
            'car_tuning_id'=>'required|exists:car_tuning,id',
            'installation'=>['sometimes','required',Rule::in(['YES','NO'])],
            'price'=>'required|numeric',
            'description'=>'nullable',
            'brand_id'=>'sometimes|required|exists:brands,id',

        ];
    }
}
