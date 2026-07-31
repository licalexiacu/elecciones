<?php

namespace sgt\Models;

use Illuminate\Database\Eloquent\Model;

class CombustibleModel extends Model
{
    protected $table = 'combustible';

    //protected $primaryKey = 'ciden'; // Se usa si el campo identidad no se llama id
    protected $fillable = ['id', 'id_padron', 'id_user', 'litros']; // Los nombre de los campos.

    // Un punteo tiene un solo Padron
    public function combustible_padron(){
        return $this->belongsTo('app/Models/PadronModel');
    }

    // Un punteo tiene un solo usuario
    public function combustible_user(){
        return $this->belongsTo('app/User');
    }
}
