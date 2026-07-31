<?php

namespace sgt\Http\Controllers;

use Illuminate\Http\Request;
use sgt\Models\RolesModels;

class RolesController extends Controller
{
    public function select(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $select = RolesModels::where('condicion', '=', '1')
            ->where('id', '!=', '1')
            ->select('id', 'nombre')
            ->orderBy('nombre', 'asc')
            ->get();    

        return [ 'select' => $select ];
    }
}
