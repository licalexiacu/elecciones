<?php

namespace sgt\Models;

use Illuminate\Database\Eloquent\Model;

class ComidaModel extends Model
{
    protected $table = 'comida';

    //protected $primaryKey = 'ciden'; // Se usa si el campo identidad no se llama id
    protected $fillable = ['id', 'id_padron', 'id_user']; // Los nombre de los campos.

    // Un punteo tiene un solo Padron
    public function comida_padron(){
        return $this->belongsTo('app/Models/PadronModel');
    }

    // Un punteo tiene un solo usuario
    public function comida_user(){
        return $this->belongsTo('app/User');
    }
}
