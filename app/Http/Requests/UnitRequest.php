<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\BaseRequest;

use Validator;

class UnitRequest extends FormRequest
{

    //
	public function authorize(){
		return true;
	}

	public function rules(){
		$rules = [
			'act'=>'required',
			'id' => 'required|integer',
			'desc' => 'required',
		];
		return $rules;
	}

	public function messages(){
		$message = [
			'act.required' => 'act不能为空',
			'id.required' => 'id不能为空',
			'id.integer' => 'id必须是整书',
			'desc.required' => '单位名称不能为空',
		];
		return $message;
	}

}
