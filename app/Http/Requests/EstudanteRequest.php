<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudanteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            "name"=> "required|string|max:255",
            "curso"=> "required|string|max:255",
            "idade"=> "required",
        ];
    }
    public function messages(): array
    {   
        return [
            "name.required"=> "O nome é obrigatório !!!",
            "name.string"=> "O campo precisa ser um texto!!!",
            "name.max"=> "O tamanho maximo deve ser até 255 caractéres !!!",
            "curso.required"=> "O curso é obrigatório !!!",
            "curso.string"=> "O campo precisa ser um texto!!!",
            "curso.max"=> "O tamanho maximo deve ser até 255 caractéres !!!",
            "idade.required"=> "A idade é obrigatório !!!",

        ]; 
    }         
}
