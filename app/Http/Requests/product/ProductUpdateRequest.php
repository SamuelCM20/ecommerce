<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends ProductRequest
{

    public function rules()
    {       
			$this->rules['file'] = ['nullable','image'];  
            
            if(!$this->hasFile('file')){
                $this->rules['file'] = ['nullable'];
            }
			return $this->rules;    
    }

}