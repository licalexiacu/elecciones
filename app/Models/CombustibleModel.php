<?php

namespace sgt\Models;

use Illuminate\Database\Eloquent\Model;

class CombustibleModel extends Model
{
    protected $table = 'combustible';

    //protected $primaryKey = 'ciden'; // Se usa si el campo identidad no se llama id
    protected $fillable = ['id', 'nombre', 'litros']; // Los nombre de los campos.

    // Un combutibl puede estar en muchos combustibles_carga
    public function combustible_combustible_carga(){
        return $this->hasMany('app/Models/Combustible_CargaModel');
    }
}
