<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesStoreRequest extends FormRequest
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
            'category_name' => 'required|min:5',
            'keterangan'    => 'required',
        ];
    }

    public function messages(){
        return [
            'category_name.required' => 'Nama kategori tidak boleh kosong',
            'category_name.min'      => 'Minimal 2',
            'keterangan.required'    => 'keterangan tidak boleh kosong',
        ];
    }
}
