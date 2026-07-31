<?php

namespace sgt\Http\Controllers;

use Illuminate\Http\Request;
use sgt\Models\PadronModel;
use sgt\Models\ComidaModel;
use Illuminate\Support\Facades\DB;

class ComidaController extends Controller
{
    public function index(Request $request)
    {
        // Si la peticion es diferente de AJAX redirije todo al raiz
        if (!$request->ajax()) return redirect('/');

        $busqueda = $request->busqueda;

        if ($busqueda==''){
            $table = PadronModel::leftjoin('comida','padron.id','=','comida.id_padron')
                ->leftjoin('users','comida.id_user','=','users.id')
                ->selectraw('padron.*, coalesce(comida.id,0) as id_comida, coalesce(comida.id_user,0) as id_user_comida, users.nombre as nombre_user, comida.created_at, comida.updated_at')
                ->orderBy('padron.nombre', 'asc')
                ->paginate(15);    
        } else {
            $table = PadronModel::leftjoin('comida','padron.id','=','comida.id_padron')
                ->leftjoin('users','comida.id_user','=','users.id')
                ->whereraw('UPPER(padron.nombre) LIKE UPPER('.chr(39).'%'.$busqueda.'%'.chr(39).') OR CAST(padron.dni AS varchar(8)) LIKE '.chr(39).'%'.$busqueda.'%'.chr(39).'')
                ->selectraw('padron.*, coalesce(comida.id,0) as id_comida, coalesce(comida.id_user,0) as id_user_comida, users.nombre as nombre_user, comida.created_at, comida.updated_at')
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

    public function comida(Request $request)
    {
        $table = new ComidaModel;
        $table->id_user = \Auth::user()->id;
        $table->id_padron = $request->id_padron;

        $table->save();
    }
}
