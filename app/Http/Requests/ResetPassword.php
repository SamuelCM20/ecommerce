<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPassword extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        $rules = [
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['confirmed', 'string','min:8'],
        ];
        return $rules;
    }
}
