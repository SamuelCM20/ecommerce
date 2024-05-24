<?php

namespace App\Http\Requests\user;

use App\Http\Requests\User\UserRequest;

class RegisterRequest extends UserRequest
{

	public function authorize()
    {
        return true;
    }

    public function rules()
    {
		return $this->rules;
        
    }

}
