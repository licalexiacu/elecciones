<?php

namespace sgt\Http\Controllers;
use sgt\Models\PadronModel;
use sgt\Models\PunteoModel;
use sgt\Models\ComidaModel;
use sgt\Models\ConteoModel;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class GraficosController extends Controller
{
    public function graficos(Request $request){
        $padron = PadronModel::selectRaw("count(*) as padron")->get();
        $punteo = PunteoModel::selectRaw("count(*) as punteo")->get();
        $comida = ComidaModel::selectRaw("count(*) as comida")->get();
        $conteo = ConteoModel::selectRaw("sum(conteo) as conteo")->get();
        $conteo_seguro = ConteoModel::selectRaw("sum(conteo_seguro) as conteo_seguro")->get();

        return ['padron'=>$padron, 'punteo'=>$punteo, 'comida'=>$comida, 'conteo'=>$conteo, 'conteo_seguro'=>$conteo_seguro];
    }
}
