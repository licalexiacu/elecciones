<?php

namespace sgt\Http\Controllers;

use Illuminate\Http\Request;
use sgt\Models\ConteoModel;
use Illuminate\Support\Facades\DB;

class ConteoController extends Controller
{
    public function index(Request $request)
    {
        // Si la peticion es diferente de AJAX redirije todo al raiz
        if (!$request->ajax()) return redirect('/');

        $busqueda = $request->busqueda;

        if ($busqueda==''){
            $table = ConteoModel::join('users','users.id','=','conteo.id_user')
                ->select('conteo.*', 'users.nombre as usuario')
                ->orderBy('numero_mesa', 'asc')
                ->paginate(15);    
        } else {
            $table = ConteoModel::join('users','users.id','=','conteo.id_user')
                ->select('conteo.*', 'users.nombre as usuario')
                ->whereraw('UPPER(descripcion) LIKE UPPER('.chr(39).'%'.$busqueda.'%'.chr(39).') OR CAST(numero_mesa AS varchar(8)) LIKE '.chr(39).'%'.$busqueda.'%'.chr(39).'')
                ->orderBy('numero_mesa', 'asc')
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
        // Si la peticion es diferente de AJAX redirije todo al raiz
        if (!$request->ajax()) return redirect('/');
        $this->save(1, $request);
    }

    public function update(Request $request)
    {
        // Si la peticion es diferente de AJAX redirije todo al raiz
        if (!$request->ajax()) return redirect('/');
        $this->save(2, $request);
    }

    public function destroy(Request $request)
    {
        // Si la peticion es diferente de AJAX redirije todo al raiz
        if (!$request->ajax()) return redirect('/');
        ConteoModel::destroy($request->id);
    }

    public function get(Request $request)
    {
        // Si la peticion es diferente de AJAX redirije todo al raiz
        if (!$request->ajax()) return redirect('/');

        $busqueda = $request->busqueda;

        if ($busqueda==''){
            $table = ConteoModel::join('users','users.id','=','conteo.id_user')
                ->select('conteo.*', 'users.nombre as usuario')
                ->where('id_user', '=', \Auth::user()->id)
                ->orderBy('numero_mesa', 'asc')
                ->paginate(15);    
        } else {
            $table = ConteoModel::join('users','users.id','=','conteo.id_user')
                ->select('conteo.*', 'users.nombre as usuario')
                ->where('id_user', '=', \Auth::user()->id)
                ->whereraw('UPPER(descripcion) LIKE UPPER('.chr(39).'%'.$busqueda.'%'.chr(39).') OR CAST(numero_mesa AS varchar(8)) LIKE '.chr(39).'%'.$busqueda.'%'.chr(39).'')
                ->orderBy('numero_mesa', 'asc')
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

    private function save($accion, $request){
        // El nombre no es el de la base de datos sino del objeto en la vista
        $rules = [
            'descripcion'=>'required',
            'numero_mesa'=>'required|not_in:0',
            'id_user'=>'required|not_in:0'
        ];
    
        $messages = [
            'descripcion.required'=>'La DESCRIPCION es obligatoria',
            'numero_mesa.required' => 'El numero de mesa es obligatoria',
            'numero_mesa.not_in' => 'El numero de mesa no puede ser CERO',
            'id_user.not_in' => 'Debe identificar el fiscal de la mesa'
        ];
        $this->validate($request, $rules, $messages);
    
        if ($accion==1){
            // Insert
            $table = new ConteoModel;
        } else {
            // Update
            $table = ConteoModel::findOrFail($request->id);  
        }
    
        $table->descripcion = $request->descripcion;
        $table->numero_mesa = $request->numero_mesa;
        $table->conteo = $request->conteo;
        $table->conteo_seguro = $request->conteo_seguro;
        $table->id_user = $request->id_user;
        
        $table->save();
    }

    public function update_conteo(Request $request){
        // El nombre no es el de la base de datos sino del objeto en la vista
        $rules = [
            'conteo'=>'required|not_in:0'
        ];
    
        $messages = [
            'conteo.not_in' => 'DEBE INGRESAR UN CONTEO VALIDO'
        ];
        $this->validate($request, $rules, $messages);
    
        $table = ConteoModel::findOrFail($request->id);  
        $table->conteo = $request->conteo;
        $table->conteo_seguro = $request->conteo_seguro;
        
        $table->save();
    }
}
