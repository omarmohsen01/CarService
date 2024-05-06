<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VendorSparePartRequest extends FormRequest
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
            'name'=>'sometimes|string|required|min:2|max:255',
            'quantity'=> 'integer',
            'status'=> ['sometimes','required',Rule::in(['NEW','USED','IMPORTATION'])],
            'price'=>'sometimes|required|integer',
            'production_date'=>'date|before_or_equal:now',
            'expiration_date'=>'date|after:now',
            'description'=>'sometimes|string|required|min:2|max:255',
            'brand_id'=>'sometimes|required|exists:brands,id',
            // 'images'=>'mimes:jpeg,png,gif,webp',
            'videos'=>'mimes:mp4,mov,avi,wmv',
        ];
    }
}
