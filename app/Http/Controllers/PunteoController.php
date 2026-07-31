<?php

namespace sgt\Http\Controllers;

use Illuminate\Http\Request;
use sgt\Models\PadronModel;
use sgt\Models\PunteoModel;
use Illuminate\Support\Facades\DB;

class PunteoController extends Controller
{
    public function index(Request $request)
    {
        // Si la peticion es diferente de AJAX redirije todo al raiz
        if (!$request->ajax()) return redirect('/');

        $busqueda = $request->busqueda;

        if ($busqueda==''){
            $table = PadronModel::leftjoin('punteo','padron.id','=','punteo.id_padron')
                ->leftjoin('users','punteo.id_user','=','users.id')
                ->selectraw('padron.*, coalesce(punteo.id,0) as id_punteo, coalesce(punteo.id_user,0) as id_user_punteo, users.nombre as nombre_user, punteo.created_at, punteo.updated_at')
                ->orderBy('padron.nombre', 'asc')
                ->paginate(15);    
        } else {
            $table = PadronModel::leftjoin('punteo','padron.id','=','punteo.id_padron')
                ->leftjoin('users','punteo.id_user','=','users.id')
                ->whereraw('UPPER(padron.nombre) LIKE UPPER('.chr(39).'%'.$busqueda.'%'.chr(39).') OR CAST(padron.dni AS varchar(8)) LIKE '.chr(39).'%'.$busqueda.'%'.chr(39).'')
                ->selectraw('padron.*, coalesce(punteo.id,0) as id_punteo, coalesce(punteo.id_user,0) as id_user_punteo, users.nombre as nombre_user, punteo.created_at, punteo.updated_at')
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

    public function punteo(Request $request)
    {
        $table = new PunteoModel;
        $table->id_user = \Auth::user()->id;
        $table->id_padron = $request->id_padron;

        $table->save();
    }

    public function punteo_listado(Request $request)
    {
        $punteo = PunteoModel::join('padron','punteo.id_padron','=','padron.id')
            ->selectraw('padron.*, punteo.created_at')
            ->orderBy('padron.nombre', 'asc')
            ->get();

        $contador = PunteoModel::count();
            
        $pdf = \PDF::loadView('pdf.punteo_listado', ['punteo'=>$punteo, 'contador'=>$contador]);
        //return $pdf->download($numVenta[0]->num_comprobante .'.pdf');
        return $pdf->stream();
    }
}
