<?php

namespace sgt\Http\Controllers;

use Illuminate\Http\Request;
use sgt\Models\PadronModel;
use sgt\Models\CombustibleModel;
use sgt\Models\Combustible_CargaModel;
use Illuminate\Support\Facades\DB;

class Combustible_CargaController extends Controller
{
    public function index(Request $request)
    {
        // Si la peticion es diferente de AJAX redirije todo al raiz
        if (!$request->ajax()) return redirect('/');

        $busqueda = $request->busqueda;

        if ($busqueda==''){
            $table = Combustible_CargaModel::join('combustible','combustible_carga.id_combustible','=','combustible.id')
                ->join('users','combustible_carga.id_user','=','users.id')
                ->select('combustible_carga.*', 'combustible.nombre', 'users.nombre as nombre_user')
                ->orderBy('combustible_carga.id', 'asc')
                ->paginate(15);   
        } else {
            $table = Combustible_CargaModel::join('combustible','combustible_carga.id_combustible','=','combustible.id')
                ->join('users','combustible_carga.id_user','=','users.id')
                ->select('combustible_carga.*', 'combustible.nombre', 'users.nombre as nombre_user')
                ->whereraw('UPPER(combustible.nombre) LIKE UPPER('.chr(39).'%'.$busqueda.'%'.chr(39).')')
                ->orderBy('combustible.nombre', 'asc')
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

    public function store(Request $request)
    {
         $rules = [
            'id_combustible' => 'required|integer|min:1',
            'litros'    => 'required|numeric|gt:0'
        ];

        $messages = [
            'id_combustible.required' => 'Se debe elegir un votante del padrón.',
            'id_combustible.integer'  => 'El identificador del padrón debe ser un número entero.',
            'id_combustible.min'      => 'El identificador del padrón es inválido.',
            'litros.required'    => 'Los litros son necesarios.',
            'litros.numeric'     => 'Los litros deben tener un formato numérico.',
            'litros.gt'          => 'Los litros deben ser estrictamente mayores a cero.'
        ];
        $this->validate($request, $rules, $messages);

        $table = new Combustible_CargaModel;
        $table->id_user = \Auth::user()->id;
        $table->id_combustible = $request->id_combustible;
        $table->litros = $request->litros;

        $table->save();
    }

    public function combustible_listado(Request $request)
    {
        // LEFT JOIN para traer todo el padrón autorizado, hayan cargado o no.
        $combustible = Combustible_CargaModel::join('combustible', 'combustible_carga.id_combustible', '=', 'combustible.id')
            ->selectRaw('combustible.nombre, combustible.litros as autorizado, combustible_carga.litros as cargado, combustible_carga.created_at as fecha_carga')
            ->orderBy('combustible.nombre', 'asc')
            ->get();

        // Cálculos para el pie de página
        $total_autorizado = $combustible->sum('autorizado');
        $total_cargado = $combustible->sum('cargado');

        $pdf = \PDF::loadView('pdf.combustible_listado', [
            'combustible' => $combustible, 
            'total_autorizado' => $total_autorizado,
            'total_cargado' => $total_cargado
        ]);
        
        return $pdf->stream();
    }
}
