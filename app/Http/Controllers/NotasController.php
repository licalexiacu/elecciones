<?php

namespace sgt\Http\Controllers;

use Illuminate\Http\Request;
use sgt\Models\NotasModel;
use Illuminate\Support\Facades\DB;

class NotasController extends Controller
{
    public function index(Request $request)
    {
        // Si la peticion es diferente de AJAX redirije todo al raiz
        if (!$request->ajax()) return redirect('/');

        $busqueda = $request->busqueda;

        if ($busqueda==''){
            $table = NotasModel::where('notas.id_empresa', '=', \Auth::user()->id_empresa)
                ->where('notas.id_user', '=', \Auth::user()->id)
                ->orderBy('id', 'desc')
                ->paginate(14);    
        } else {
            $table = NotasModel::where('notas.id_empresa', '=', \Auth::user()->id_empresa)
                ->where('notas.id_user', '=', \Auth::user()->id)
                ->whereraw('(UPPER(notas.nota) LIKE UPPER('.chr(39).'%'.$busqueda.'%'.chr(39).') OR CAST(notas.fecha as varchar) LIKE '.chr(39).'%'.$busqueda.'%'.chr(39).')')
                ->orderBy('id', 'desc')
                ->paginate(14);    
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

    public function select(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $select = "select * from notas(".\Auth::user()->id_empresa."::integer, ".\Auth::user()->id."::integer) as (id_user integer, id_1 integer , id_user_1 integer, user_1 character varying(255), fecha_1 date, tipo_1 smallint, nota_1 text, id_2 integer,  id_user_2 integer,  user_2 character varying(255),  fecha_2 date,  tipo_2 smallint,  nota_2 text, id_3 integer,  id_user_3 integer,  user_3 character varying(255),  fecha_3 date,  tipo_3 smallint,  nota_3 text, id_4 integer,  id_user_4 integer,  user_4 character varying(255),  fecha_4 date,  tipo_4 smallint,  nota_4 text, id_5 integer,  id_user_5 integer,  user_5 character varying(255),  fecha_5 date,  tipo_5 smallint,  nota_5 text, id_6 integer,  id_user_6 integer,  user_6 character varying(255),  fecha_6 date,  tipo_6 smallint,  nota_6 text, id_7 integer,  id_user_7 integer,  user_7 character varying(255),  fecha_7 date,  tipo_7 smallint,  nota_7 text, id_8 integer,  id_user_8 integer,  user_8 character varying(255),  fecha_8 date,  tipo_8 smallint,  nota_8 text, id_9 integer,  id_user_9 integer,  user_9 character varying(255),  fecha_9 date,  tipo_9 smallint,  nota_9 text, id_10 integer, id_user_10 integer, user_10 character varying(255), fecha_10 date, tipo_10 smallint, nota_10 text, id_11 integer, id_user_11 integer, user_11 character varying(255), fecha_11 date, tipo_11 smallint, nota_11 text, id_12 integer, id_user_12 integer, user_12 character varying(255), fecha_12 date, tipo_12 smallint, nota_12 text, id_13 integer, id_user_13 integer, user_13 character varying(255), fecha_13 date, tipo_13 smallint, nota_13 text, id_14 integer, id_user_14 integer, user_14 character varying(255), fecha_14 date, tipo_14 smallint, nota_14 text, id_15 integer, id_user_15 integer, user_15 character varying(255), fecha_15 date, tipo_15 smallint, nota_15 text, id_16 integer, id_user_16 integer, user_16 character varying(255), fecha_16 date, tipo_16 smallint, nota_16 text, id_17 integer, id_user_17 integer, user_17 character varying(255), fecha_17 date, tipo_17 smallint, nota_17 text, id_18 integer, id_user_18 integer, user_18 character varying(255), fecha_18 date, tipo_18 smallint, nota_18 text, id_19 integer, id_user_19 integer, user_19 character varying(255), fecha_19 date, tipo_19 smallint, nota_19 text, id_20 integer, id_user_20 integer, user_20 character varying(255), fecha_20 date, tipo_20 smallint, nota_20 text)";
        $select = DB::select($select);
        
        return [ 'select' => $select ];
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
        MedicosModel::destroy($request->id);
    }
    
    private function save($accion, $request){
        // El nombre no es el de la base de datos sino del objeto en la vista
        $rules = [
            'nota'=>'required'
        ];
    
        $messages = [
            'nota.required'=>'La nota es obligatorio'
            
        ];
        $this->validate($request, $rules, $messages);
    
        if ($accion==1){
            // Insert
            $table = new NotasModel;
            $table->id_empresa = \Auth::user()->id_empresa;
            $table->id_user = \Auth::user()->id;
        } else {
            // Update
            $table = NotasModel::findOrFail($request->id);  
        }
        $table->tipo = $request->tipo;
        $table->visible = $request->visible;
        $table->activo = $request->activo;
        $table->nota = $request->nota;
        
        $table->save();
    }

    public function update_escritorio(Request $request){
        // El nombre no es el de la base de datos sino del objeto en la vista
        $rules = [
            'id'=>'required|not_in:0',
            'nota'=>'required'
        ];
        
        $messages = [
            'id.not_in' => 'El ID de la nota no puede ser CERO',
            'nota.required'=>'La nota es obligatorio'
        ];
        $this->validate($request, $rules, $messages);
        
        // Update
        $table = NotasModel::findOrFail($request->id);  
        $table->nota = $request->nota;
        
        $table->save();
    }

    public function archivar(Request $request){
        // El nombre no es el de la base de datos sino del objeto en la vista
        $rules = [
            'id'=>'required|not_in:0'
        ];
        
        $messages = [
            'id.not_in' => 'El ID de la nota no puede ser CERO'
        ];
        $this->validate($request, $rules, $messages);
        
        // Update
        $table = NotasModel::findOrFail($request->id);  
        $table->activo = 2;
        
        $table->save();
    }
    
    private function if_null($valor) {
        $this->$valor = (is_null($valor) || empty($valor) || strlen($valor) < 1 ? '' : $valor);
    
        return $this->$valor;
    }
}
