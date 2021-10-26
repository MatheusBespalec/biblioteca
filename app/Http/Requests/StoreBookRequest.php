<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'title'=>['required'],
            'image'=>['bail','required','image'],
            'description'=>['required'],
            'author'=>['bail','required','regex:/^[a-záàâãéèêíïóôõöúçñ ]+$/i'],
            'available'=>['bail','required','boolean']
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Campo nome é obrigatório!',
            'image.required'=>'Selecione uma imagem!!',
            'image.image'=>'Imagem inválida!',
            'description.required'=>'Campo descrição é obrigatório!',
            'author.required'=>'Campo autor é obrigatório!',
            'author.regex'=>'Nome do author não pode conter numeros ou caracteres especiais!',
            'available.required'=>'Selecione uma opção válida!',
            'available.boolean'=>'Selecione uma opção válida!',
        ];
    }
}
