<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
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
            'title' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'description' => 'required',
            'address' => 'required',
            'email' => 'required',
            'type' => 'required',
            'phone' => 'required',
            'image' => 'mimes:png,jpg',
            'proposal' => 'required|url'
        ];
    }
}
