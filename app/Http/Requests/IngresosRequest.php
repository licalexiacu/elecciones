<?php

namespace sgt\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngresosRequest extends FormRequest
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
        // El nombre no es el de la base de datos sino del objeto en la vista
        return [
            'idproveedor' => 'required|not_in:0',
            'tipo_comprobante'=>'required|max:20',
            'num_comprobante'=>'required|max:10',
            'impuesto'=>'required|numeric|not_in:0',
            'total'=>'required|numeric|not_in:0',
            
        ];
    }

    public function messages()
    {
        return [
        'idproveedor.not_in' => 'Seleccione un proveedor',
        ];
    }
}
