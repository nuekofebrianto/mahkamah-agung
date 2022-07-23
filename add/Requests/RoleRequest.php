<?php

namespace Add\Requests;
use Illuminate\Foundation\Http\FormRequest;
class RoleRequest extends FormRequest
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
			"nama.required" => "tidak boleh kosong !",
		];
	}
}