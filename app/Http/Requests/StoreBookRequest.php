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
            'available'=>['bail','required','boolean'],
            'giver_id'=>['bail','required','numeric','exists:users,id']
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
            'giver_id.required'=>'O ID do doador é um campo obrigatório!',
            'giver_id.exists'=>'Não existe um usuario com esse id'
        ];
    }
}
