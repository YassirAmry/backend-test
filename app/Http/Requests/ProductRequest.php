<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required',
            'description'   => 'required',
            'enable'        => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'name'          => 'Nama Produk',
            'description'   => 'Keterangan',
            'enable'        => 'Status Aktif'
        ];
    }

    public function messages()
    {
        return [
            'required'  => 'Isian :attribute wajib diisi'
        ];
    }
}
