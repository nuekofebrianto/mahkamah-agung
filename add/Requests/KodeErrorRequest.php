<?php

    namespace Add\Requests;
    use Illuminate\Foundation\Http\FormRequest;
    class KodeErrorRequest extends FormRequest
    {
    
        public function authorize()
        {
            return true;
        }
    
        public function rules()
        { 
            if($this->method() == "POST"){
        return [
'kode_error'=> 'String|required|unique:kode_error,kode_error',
'penjelasan'=> 'String|required',
'penyelesaian'=> 'String|required',
'status'=> 'String|required',
];}
else{
    return [
'kode_error'=> 'String|required|unique:kode_error,kode_error,'.$this->request->get("id"),
'penjelasan'=> 'String|required',
'penyelesaian'=> 'String|required',
'status'=> 'String|required',
];
}}
public function messages()
{
        return [
"kode_error.String" => "kode_error harus berupa text !",
"kode_error.required" => "kode_error tidak boleh kosong !",
"kode_error.unique" => "kode_error sudah digunakan !",
"penjelasan.String" => "penjelasan harus berupa text !",
"penjelasan.required" => "penjelasan tidak boleh kosong !",
"penyelesaian.String" => "penyelesaian harus berupa text !",
"penyelesaian.required" => "penyelesaian tidak boleh kosong !",
"status.String" => "status harus berupa text !",
"status.required" => "status tidak boleh kosong !",

];
}
}

