<?php

namespace sgt\Http\Controllers;

use Illuminate\Http\Request;
use sgt\Models\CombustibleModel;

class CombustibleController extends Controller
{
    public function index(Request $request)
    {
        // Si la peticion es diferente de AJAX redirije todo al raiz
        if (!$request->ajax()) return redirect('/');

        $busqueda = $request->busqueda;

        if ($busqueda==''){
            $table = CombustibleModel::orderBy('nombre', 'asc')->paginate(15);      
        } else {
            $table = CombustibleModel::whereraw('UPPER(nombre) LIKE UPPER('.chr(39).'%'.$busqueda.'%'.chr(39).')')->orderBy('nombre', 'asc')->paginate(15);    
        }

        return [
            'pagination' => [
                'total'        => $table->total(),
                'current_page' => $table->currentPage(),
                'per_page'     => $table->perPage(),
                'last_page'    => $table->lastPage(),
                'first_item'   => $table->firstItem(),
                'last_item'    => $table->lastItem(),
            ],
            'table' => $table
        ];
    }

    public function store(Request $request)
    {
         $rules = [
            'nombre' => 'required',
            'litros'    => 'required|numeric|gt:0'
        ];

        $messages = [
            'nombre.required' => 'Se debe ingresar le nombre',
            'litros.required'    => 'Los litros son necesarios.',
            'litros.numeric'     => 'Los litros deben tener un formato numérico.',
            'litros.gt'          => 'Los litros deben ser estrictamente mayores a cero.'
        ];
        $this->validate($request, $rules, $messages);

        $table = new CombustibleModel;
        $table->nombre = $request->nombre;
        $table->litros = $request->litros;

        $table->save();
    }

    public function update(Request $request)
    {
         $rules = [
            'nombre' => 'required',
            'litros'    => 'required|numeric|gt:0'
        ];

        $messages = [
            'nombre.required' => 'Se debe ingresar le nombre',
            'litros.required'    => 'Los litros son necesarios.',
            'litros.numeric'     => 'Los litros deben tener un formato numérico.',
            'litros.gt'          => 'Los litros deben ser estrictamente mayores a cero.'
        ];
        $this->validate($request, $rules, $messages);

        $table = CombustibleModel::findOrFail($request->id);  
        $table->nombre = $request->nombre;
        $table->litros = $request->litros;

        $table->save();
    }

    public function select(Request $request){
        if (!$request->ajax()) return redirect('/');

        $filtro = $request->filtro;

        $select =  $table = CombustibleModel::whereraw('UPPER(nombre) LIKE UPPER('.chr(39).'%'.$filtro.'%'.chr(39).')')
            ->orderBy('nombre', 'asc')
            ->get();

        return ['combustible' => $select];
    }
}
