<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandRequest extends FormRequest
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
        $brand_id=$this->route('brand');
        return [
            'name'=>[
                Rule::unique('brands')->ignore($brand_id),
                'required','string','max:255','min:3','sometimes'
            ],
            'country_of_manufacture'=>'required|sometimes',
            'image'=>'image|mimes:png,jpg,jpng'
        ];
    }
}
