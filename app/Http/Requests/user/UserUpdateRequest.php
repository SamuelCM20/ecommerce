<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends UserRequest
{

    public function rules()
    {

       
            $this->rules['number_id'] = ['required', 'numeric', 'unique:users,number_id,' . $this->user->id];
            $this->rules['email'] = ['required', 'email', 'unique:users,email,' . $this->user->id];
            $this->rules['password'] = ['nullable', 'confirmed', 'string', 'min:8'];
			$this->rules['file'] = ['nullable','image'];  
            
            if(!$this->hasFile('file')){
                $this->rules['file'] = ['nullable'];
            }
        
			return $this->rules;

        
    }

}
