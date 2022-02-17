<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePemasukanRequest extends FormRequest
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
            'jenis_id' => 'required',
            'amount' => 'required|numeric',
            'deskripsi_pemasukan' => 'required'
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
            'jenis_id.required' => ':attribute Mohon Diisi',
            'amount.required' => ':attribute Mohon Diisi',
            'amount.numeric' => ':attribute Harus Berupa Numeric',
            'deskripsi_pemasukan.required' => ':attribute Mohon Diisi',

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
            'jenis_id' => 'Nama Jenis',
            'amount' => 'Total Pemasukan',
            'deskripsi_pemasukan' => 'Deskripsi Pemasukan',
        ];
    }
}
