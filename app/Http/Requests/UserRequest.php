<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                    => 'required',
            'lastname'                => 'required',
            'email'                   => 'required|email|unique:users,email,'.$this->request->get('id'), 
            'password'                => 'required',                               
            'city_id'                 => 'required',
            'terms_conditions'        => 'required'
        ];
    }

    public function messages($id = '') {
        return [
            'name.required'                 => 'El nombre es obligatorio',
            'lastname.required'             => 'El apellido es obligatorio',
            'email.required'                => 'El correo electrónico es obligatorio',
            'email.unique'                  => 'El correo electrónico ya se encuentra registrado',
            'password.required'             => 'La contraseña es obligatoria',
            'city_id.required'              => 'La ciudad es obligatoria', 
            'terms_conditions.required'     => 'Debe aceptar los términos y condiciones'
        ];
    }

    public function failedValidation(Validator $validator) { 
        $errors = $validator->errors();

        foreach($errors->messages() AS $key => $error){
            throw new HttpResponseException(response()->json([
                'message' => $error[0]
            ], 422)); 
        }
   }
}
