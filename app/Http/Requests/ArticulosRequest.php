<?php

namespace sgt\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticulosRequest extends FormRequest
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
            'idcategoria' => 'required|not_in:0',
            'codigo'=>'required|max:50',
            'nombre'=>'required|max:100',
            'precio_venta'=>'required|numeric|not_in:0',
            'stock'=>'required|numeric',
            'descripcion'=>'max:256',
        ];
    }

    public function messages()
    {
        return [
        'idcategoria.not_in' => 'El Campo Categoria es Obligatorio!!!',
        ];
    }
}
