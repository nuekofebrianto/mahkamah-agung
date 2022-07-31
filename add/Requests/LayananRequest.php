<?php

namespace Add\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LayananRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->method() == "POST") {
            return [
                'aplikasi_id' => 'required',
                'penjelasan_insiden' => 'String|required',
                'satker_organisasi' => 'String|required',
               
            ];
        } else {
            return [
                'aplikasi_id' => 'required',
                'penjelasan_insiden' => 'String|required',
                'satker_organisasi' => 'String|required',
               
            ];
        }
    }
    public function messages()
    {
        return [
            "aplikasi_id.Integer" => "aplikasi harus berupa angka !",
            "aplikasi.required" => "aplikasi tidak boleh kosong !",
            "penjelasan_insiden.String" => "penjelasan_insiden harus berupa text !",
            "penjelasan_insiden.required" => "penjelasan_insiden tidak boleh kosong !",
            "satker_organisasi.String" => "satker_organisasi harus berupa text !",
            "satker_organisasi.required" => "satker_organisasi tidak boleh kosong !",
          

        ];
    }
}
