<?php

namespace sgt\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            // El nombre no es el de la base de datos sino del objeto en la vista
            'nombre'=>'required|max:100',
            'idrol' => 'required|not_in:0',
            'usuario'=>'required|max:100',
            'password'=>'required|max:50',
        ];
    }
}
