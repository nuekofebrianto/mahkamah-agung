<?php

namespace Add\Requests;
use Illuminate\Foundation\Http\FormRequest;
class GudangRequest extends FormRequest
{

	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		if($this->method() == "POST"){
			return [
				"nama" => "required",
			];
		}
		else{
			return [
				"nama" => "required",
			];
		}
	}

	public function messages()
	{
		return [
			"nama.required" => "nama tidak boleh kosong !",
		];
	}
}