<?php

namespace sgt\Http\Controllers;

use Illuminate\Http\Request;
use sgt\Models\PadronModel;
use sgt\Models\CombustibleModel;
use Illuminate\Support\Facades\DB;

class CombustibleController extends Controller
{
        public function index(Request $request)
    {
        // Si la peticion es diferente de AJAX redirije todo al raiz
        if (!$request->ajax()) return redirect('/');

        $busqueda = $request->busqueda;

        if ($busqueda==''){
            $table = CombustibleModel::join('padron','combustible.id_padron','=','padron.id')
                ->join('users','combustible.id_user','=','users.id')
                ->selectraw('padron.*, coalesce(combustible.id,0) as id_combustible, coalesce(combustible.id_user,0) as id_user_combustible, users.nombre as nombre_user, combustible.created_at, combustible.updated_at, combustible.litros')
                ->orderBy('padron.nombre', 'asc')
                ->paginate(15);   
        } else {
            $table = CombustibleModel::join('padron','combustible.id_padron','=','padron.id')
                ->join('users','combustible.id_user','=','users.id')
                ->whereraw('UPPER(padron.nombre) LIKE UPPER('.chr(39).'%'.$busqueda.'%'.chr(39).') OR CAST(padron.dni AS varchar(8)) LIKE '.chr(39).'%'.$busqueda.'%'.chr(39).'')
                ->selectraw('padron.*, coalesce(combustible.id,0) as id_combustible, coalesce(combustible.id_user,0) as id_user_combustible, users.nombre as nombre_user, combustible.created_at, combustible.updated_at, combustible.litros')
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

    public function combustible(Request $request)
    {
         $rules = [
            'id_padron' => 'required|integer|min:1',
            'litros'    => 'required|numeric|gt:0'
        ];

        $messages = [
            'id_padron.required' => 'Se debe elegir un votante del padrón.',
            'id_padron.integer'  => 'El identificador del padrón debe ser un número entero.',
            'id_padron.min'      => 'El identificador del padrón es inválido.',
            'litros.required'    => 'Los litros son necesarios.',
            'litros.numeric'     => 'Los litros deben tener un formato numérico.',
            'litros.gt'          => 'Los litros deben ser estrictamente mayores a cero.'
        ];
        $this->validate($request, $rules, $messages);

        $table = new CombustibleModel;
        $table->id_user = \Auth::user()->id;
        $table->id_padron = $request->id_padron;
        $table->litros = $request->litros;

        $table->save();
    }

    public function combustible_listado(Request $request)
    {
        $combustible = CombustibleModel::join('padron','combustible.id_padron','=','padron.id')
            ->selectraw('padron.*, combustible.created_at')
            ->orderBy('padron.nombre', 'asc')
            ->get();

        $contador = CombustibleModel::count();
            
        $pdf = \PDF::loadView('pdf.combustible_listado', ['combustible'=>$combustible, 'contador'=>$contador]);
        //return $pdf->download($numVenta[0]->num_comprobante .'.pdf');
        return $pdf->stream();
    }
}
