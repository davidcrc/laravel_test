<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;        //por ahora para todos
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'message' => ['required', 'max:160'],
        ];
    }

    public function messages()             //por que el nombre?????' o es el nombre por defecto
    {
        return ['message.required' => "Favor ecribir un mensaje!!",
        'message.max' => "El mensaje no puede superar los 160 caracteres!"
        ];
    }
    
}
