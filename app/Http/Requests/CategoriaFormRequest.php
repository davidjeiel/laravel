<?php

namespace lara3\Http\Requests;

use lara3\Http\Requests\Request;

class CategoriaFormRequest extends Request
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
            'nomeCategoria' => 'required|max:256',
            'descricao'     => 'max:256'
        ];
    }
}
