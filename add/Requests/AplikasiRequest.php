<?php

namespace Add\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AplikasiRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->method() == "POST") {
            return [
                'nama' => 'String|required',
            ];
        } else {
            return [
                'nama' => 'String|required',
            ];
        }
    }
    public function messages()
    {
        return [
            "nama.String" => "nama harus berupa text !",
            "nama.required" => "nama tidak boleh kosong !",

        ];
    }
}
