<?php

namespace sgt\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentasRequest extends FormRequest
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
            'idcliente' => 'required|not_in:0',
            'tipo_comprobante'=>'required|max:20',
            'num_comprobante'=>'required|max:10',
            'impuesto'=>'required|numeric|not_in:0',
            'total'=>'required|numeric|not_in:0',
        ];
    }

    public function messages()
    {
        return [
        'idcliente.not_in' => 'Seleccione el cliente',
        ];
    }
}
