<?php

    namespace Add\Requests;
    use Illuminate\Foundation\Http\FormRequest;
    class PerbaikanRequest extends FormRequest
    {
    
        public function authorize()
        {
            return true;
        }
    
        public function rules()
        { 
            if($this->method() == "POST"){
        return [
'layanan_id'=> 'Integer|required',
'tingkat_prioritas_id'=> 'Integer|required',
'kategori_perbaikan_id'=> 'Integer|required',
'perbaikan'=> 'String|required',
'alasan'=> 'String|required',
];}
else{
    return [
'layanan_id'=> 'Integer|required',
'tingkat_prioritas_id'=> 'Integer|required',
'kategori_perbaikan_id'=> 'Integer|required',
'perbaikan'=> 'String|required',
'alasan'=> 'String|required',
];
}}
public function messages()
{
        return [
"layanan_id.Integer" => "layanan harus berupa angka !",
"layanan.required" => "layanan tidak boleh kosong !",
"tingkat_prioritas_id.Integer" => "tingkat_prioritas harus berupa angka !",
"tingkat_prioritas.required" => "tingkat_prioritas tidak boleh kosong !",
"kategori_perbaikan_id.Integer" => "kategori_perbaikan harus berupa angka !",
"kategori_perbaikan.required" => "kategori_perbaikan tidak boleh kosong !",
"perbaikan.String" => "perbaikan harus berupa text !",
"perbaikan.required" => "perbaikan tidak boleh kosong !",
"alasan.String" => "alasan harus berupa text !",
"alasan.required" => "alasan tidak boleh kosong !",

];
}
}

