<?php

namespace sgt\Http\Controllers;
use sgt\Models\PadronModel;
use sgt\Models\PunteoModel;
use sgt\Models\ComidaModel;
use sgt\Models\ConteoModel;
use sgt\Models\CombustibleModel;
use sgt\Models\Combustible_CargaModel;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class GraficosController extends Controller
{
    public function graficos(Request $request){
        $padron = PadronModel::count();
        $punteo = PunteoModel::count();
        $comida = ComidaModel::count();
        $conteo = ConteoModel::sum('conteo') ?? 0;
        $conteo_seguro = ConteoModel::sum('conteo_seguro') ?? 0;
        $combustible_total =CombustibleModel::sum('litros');
        $combustible_cargado = Combustible_CargaModel::sum('litros');

        return response()->json(['padron'=>$padron, 
                                'punteo'=>$punteo, 
                                'comida'=>$comida, 
                                'conteo'=>$conteo, 
                                'conteo_seguro'=>$conteo_seguro, 
                                'combustible_total' => $combustible_total,
                                'combustible_cargado' => $combustible_cargado], 200);
    }
}
