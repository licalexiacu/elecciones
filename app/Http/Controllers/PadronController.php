<?php

namespace sgt\Http\Controllers;
use sgt\Models\PadronModel;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PadronController extends Controller
{
    public function index(Request $request)
    {
        // Si la peticion es diferente de AJAX redirije todo al raiz
        if (!$request->ajax()) return redirect('/');

        $busqueda = $request->busqueda;

        if ($busqueda==''){
            $table = PadronModel::leftjoin('users','padron.id_user','=','users.id')
                ->select('padron.*', 'users.nombre as usuario')
                ->orderBy('padron.nombre', 'asc')
                ->paginate(15);    
        } else {
            $table = PadronModel::leftjoin('users','padron.id_user','=','users.id')
                ->select('padron.*', 'users.nombre as usuario')
                ->whereraw('UPPER(padron.nombre) LIKE UPPER('.chr(39).'%'.$busqueda.'%'.chr(39).') OR CAST(padron.dni AS varchar(8)) LIKE '.chr(39).'%'.$busqueda.'%'.chr(39).'')
                ->orderBy('padron.nombre', 'asc')
                ->paginate(15);    
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

    public function update(Request $request)
    {
        // El nombre no es el de la base de datos sino del objeto en la vista
        $rules = [
            'edad'=>'required|not_in:0',
            'tipo_votante'=>'required|not_in:0'
        ];

        $messages = [
            'edad.not_in' => 'La edad es un dato OBLIGATORIO',
            'tipo_votante.not_in' => 'El T. de Votante es un dato OBLIGATORIO'
        ];
        $this->validate($request, $rules, $messages);

        $table = PadronModel::findOrFail($request->id);

        $table->barrio = $this->if_null($request->barrio);
        $table->referencia = $this->if_null($request->referencia);
        $table->edad = $request->edad;
        $table->tipo_votante = $request->tipo_votante;
        $table->id_user = \Auth::user()->id;
        $table->estado= 1;

        $table->save();
    }

    public function select(Request $request){
        if (!$request->ajax()) return redirect('/');

        $filtro = $request->filtro;

        $select =  $table = PadronModel::selectraw("*, CONCAT(nombre, ' (', dni, ')')  as votante")
            ->whereraw('UPPER(padron.nombre) LIKE UPPER('.chr(39).'%'.$filtro.'%'.chr(39).') OR CAST(padron.dni AS varchar(8)) LIKE '.chr(39).'%'.$filtro.'%'.chr(39).'')
            ->orderBy('nombre', 'asc', 'dni', 'asc')
            ->get();

        return ['padron' => $select];
    }

    private function if_null($valor) {
    	$this->$valor = (is_null($valor) || empty($valor) || strlen($valor) < 1 ? '' : $valor);

    	return $this->$valor;
    }
}
