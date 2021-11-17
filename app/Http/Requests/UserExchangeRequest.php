<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UserExchangeRequest extends FormRequest
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
            'bot_presentation' => 'required|numeric',
            'code'             => 'required|unique:user_exchanges,code', 
        ];
    }

    public function messages() {
        return [
            'bot_presentation.required' => 'La presentación de la botella es obligatoria',
            'bot_presentation.numeric'  => 'La presentación debe ser un número',
            'code.required'             => 'El código de canje es obligatorio',
            'code.unique'               => 'El código ya ha sido registrado anteriormente',
        ];
    }

    public function failedValidation(Validator $validator) { 
        $errors = $validator->errors();

        foreach($errors->messages() AS $key => $error){
            throw new HttpResponseException(response()->json([
                'success' => false,
                'message' => $error[0]
            ], 200)); 
        }
   }
}
