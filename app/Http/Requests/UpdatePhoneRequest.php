<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePhoneRequest extends FormRequest
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
            'phone_no' => 'required|unique:phones,phone_no|min:9|max:13',
            'provider' => 'required'
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
            'phone_no.required' => ':attribute Mohon Diisi',
            'phone_no.unique' => ':attribute Sudah Terdaftar',
            'phone_no.min' => ':attribute Minimal 9',
            'phone_no.unique' => ':attribute Maximal 13',

            'provider.required' => ':attribute Mohon Diisi',
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
            'phone_no' => 'Nomor Handphone',
            'provider' => 'Provider',
        ];
    }
}
