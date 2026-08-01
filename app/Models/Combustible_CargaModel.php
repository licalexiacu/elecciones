<?php

namespace sgt\Models;

use Illuminate\Database\Eloquent\Model;

class Combustible_CargaModel extends Model
{
    protected $table = 'combustible_carga';

    //protected $primaryKey = 'ciden'; // Se usa si el campo identidad no se llama id
    protected $fillable = ['id', 'id_combustible', 'id_user', 'litros']; // Los nombre de los campos.

    // Un punteo tiene un solo Padron
    public function combustible_carga_combustible(){
        return $this->belongsTo('app/Models/CombustibleModel');
    }

    // Un punteo tiene un solo usuario
    public function combustible_user(){
        return $this->belongsTo('app/User');
    }
}