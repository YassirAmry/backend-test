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
            'name'          => 'required|string',
            'description'   => 'required|string',
            'enable'        => 'required|boolean',
            'categories'    => 'nullable|string',
            'images'        => 'nullable|string'
        ];
    }

    public function attributes()
    {
        return [
            'name'          => 'Nama Produk',
            'description'   => 'Keterangan',
            'enable'        => 'Status Aktif',
            'categories'    => 'Kategori Produk',
            'images'        => 'Foto Produk'
        ];
    }

    public function messages()
    {
        return [
            'required'  => 'Isian :attribute wajib diisi',
            'boolean'   => 'Isian :attribute tidak sesuai format'
        ];
    }
}
