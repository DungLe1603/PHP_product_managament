<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'id_category' => 'required',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }

    public function message()
    {
        return [
            'name.required' => 'dien ten',
            'name.min' => 'toi thieu 5 tu',
            'images.required' => 'them anh',
            'images.*.image' => 'hinh anh ko hop le',
            'images.*.mimes' => 'duoi hinh anh ko hop le'
        ];
    }
}
