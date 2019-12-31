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
            'category_id' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }

    public function message()
    {
        return [
            'required'=>':attribute Không được để trống',
            'min' => ':attribute ko duoc it hon :min ky tu',
            'image' => 'phai la hình ảnh',
            'mimes' => 'phai dinh dang như sau:jpeg,png,jpg,gif'
        ];
    }
}
