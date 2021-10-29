<?php

namespace App\Http\Requests;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreLoanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = User::find(request('user_id'));
        $book = Book::find(request('book_id'));

        if (Gate::forUser($user)->denies('get-loan', $book)) {
            return false;
        }

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
            'book_id'=>['bail','required','exists:books,id'],
            'user_id'=>['bail','required','exists:users,id'],
        ];
    }

    public function messages()
    {
        return [
            'book_id.required'=>'È obrigatório informar o código do livro!',
            'user_id.required'=>'È obrigatório informar o numero do leitor!',
            'book_id.exists'=>'Livro não cadastrato!',
            'user_id.exists'=>'Leitor não cadastrado!',
        ];
    }
}
