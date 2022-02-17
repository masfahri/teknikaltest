<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JenisRequest extends FormRequest
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
            'nama_jenis' => 'required',
            'kategori' => 'required'
        ];
    }

    /**
     * Get the messages rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nama_jenis.required' => ':attribute Mohon Diisi',
            'kategori.required' => ':attribute Mohon Diisi',
        ];
    }

    /**
     * Set the :attribute name of rules that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'nama_jenis' => 'Nama Jenis',
            'kategori' => 'Kategori Jenis',
        ];
    }
}
