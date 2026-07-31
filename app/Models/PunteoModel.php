<?php

namespace sgt\Models;

use Illuminate\Database\Eloquent\Model;

class PunteoModel extends Model
{
    protected $table = 'punteo';

    //protected $primaryKey = 'ciden'; // Se usa si el campo identidad no se llama id
    protected $fillable = ['id', 'id_padron', 'id_user']; // Los nombre de los campos.

    // Un punteo tiene un solo Padron
    public function punteo_padron(){
        return $this->belongsTo('app/Models/PadronModel');
    }

    // Un punteo tiene un solo usuario
    public function punteo_user(){
        return $this->belongsTo('app/User');
    }
}
