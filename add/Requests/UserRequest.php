<?php

namespace Add\Requests;
use Illuminate\Foundation\Http\FormRequest;
class UserRequest extends FormRequest
{

	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		if($this->method() == "POST"){
			return [
				"role_id" => "required",
				"username" => "required|unique:users,username",
				'email' => 'required|unique:users,email'
			];
		}
		else{
			return [
				"role_id" => "required",
				"username" => "required|unique:users,username,".$this->request->get('id'),
				'email' => 'required|unique:users,email,'.$this->request->get('id')
			];
		}
	}

	public function messages()
	{
		return [
			"role_id.required" => "role tidak boleh kosong !",
			"username.required" => "username tidak boleh kosong !",
			"username.unique" => "username tidak tersedia !",
			"email.required" => "email tidak boleh kosong !",
			"email.unique" => "email sudah terdaftar !",
		];
	}
}