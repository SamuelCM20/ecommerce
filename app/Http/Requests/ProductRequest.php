<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        $rules = [
            'name' => ['required', 'string'],
            'details' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'shipping_cost' => ['numeric'],
            'description' => ['nullable', 'string'],
            'stock' => ['required', 'numeric'],
            'category_id' => ['required', 'numeric']
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del producto es requerido',
            'name.string' => 'El nombre del producto debe ser un texto',
            'details.required' => 'La descripción del producto es requerida',
            'details.string' => 'La descripción del producto debe ser un texto',
            'price.required' => 'El precio del producto es requerido',
            'price.numeric' => 'El precio del producto debe ser un número',
           'shipping_cost.required' => 'El costo de envío es requerido',
           'shipping_cost.numeric' => 'El costo de envío debe ser un número',
           'stock.required' => 'El stock es requerido',
           'stock.numeric' => 'El stock debe ser un número',
            'category_id.required' => 'La categoría es requerida',
            'category_id.numeric' => 'La categoría debe ser un número'
        ];
        
    }
}
