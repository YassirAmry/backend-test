<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
            'name'      => 'required|string',
            'file'      => 'required|image',
            'enable'    => 'required|boolean'
        ];
    }

    public function attributes()
    {
        return [
            'name'      => 'Judul File',
            'file'      => 'Nama File',
            'enable'    => 'Status Aktif'
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
