<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {

        $rules = [
            'name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'number_id' => ['required', 'numeric', 'unique:users,number_id'],
            'phone' => ['required', 'numeric'],
            'address' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'string', 'min:8']
        ];

        if ($this->method() == 'PUT') {
            $rules['number_id'] = ['required', 'numeric', 'unique:users,number_id,' . $this->user->id];
            $rules['email'] = ['required', 'email', 'unique:users,email,' . $this->user->id];
            $rules['password'] = ['nullable', 'confirmed', 'string', 'min:8'];
        }

        // if($this->path() != 'api/register'){
        //      $rules['role'] = ['required', 'string','in:user,admin,librarian'];
        // }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe ser valido',
            'last_name.required' => 'El apellido es requerido',
            'last_name.string' => 'El apellido debe ser valido',
            'number_id.required' => 'El numero de identificacion es requerido',
            'number_id.numeric' => 'El numero de identificacion debe ser numerico',
            'number_id.unique' => 'El numero de identificacion ya existe',
            'phone.required' => 'El telefono es requerido',
            'phone.numeric' => 'El telefono debe ser numerico',
            'address.required' => 'La direccion es requerida',
            'address.string' => 'La direccion debe ser valida',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email debe ser valido',
            'email.unique' => 'El email ya existe',
            'password.required' => 'La contraseña es requerida',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password.string' => 'La contraseña debe ser valida',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
        ];
    }
}
