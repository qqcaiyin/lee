<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\BaseRequest;

use Validator;

class CalendarRequest extends FormRequest
{
    //
	public function authorize(){
		return true;
	}

	public function rules(){
		$rules = [
			'event' => 'required|max:100',
			'startdate' => 'required',
			'enddate' => 'required',
			's_hour' => 'required',
			's_minute' => 'required',
			'e_hour' => 'required',
			'e_minute' => 'required',
		];
		return $rules;
	}

	public function messages(){
		$message = [
			'id.required' => 'id不能为空',
			'id.integer' => 'id必须是整书',
			'desc.required' => '单位名称不能为空',
		];
		return $message;
	}

}
