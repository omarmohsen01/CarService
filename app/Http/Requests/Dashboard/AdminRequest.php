<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
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
        $admin_id=$this->route('admin');
        return [
            'first_name' => 'required|sometimes|string|max:255|min:2',
            'last_name' => 'required|sometimes|string|max:255|min:2',
            'image' => 'image|mimes:png,jpg,jpeg',
            'email'=>[
                Rule::unique('admins')->ignore($admin_id),
                'required','email','max:255','min:3'
            ],
            'password' => 'required|sometimes|string',
            'phone' => [
                Rule::unique('admins')->ignore($admin_id),
                'sometimes','regex:/^(\+?20)?(10|11|12|15)\d{8}$/'],
            'type'=>'string'
        ];
    }
}
