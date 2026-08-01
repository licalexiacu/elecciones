<?php

namespace sgt\Models;

use Illuminate\Database\Eloquent\Model;

class PadronModel extends Model
{
    protected $table = 'padron';
    //protected $primaryKey = 'ciden'; // Se usa si el campo identidad no se llama id
    protected $fillable = ['id', 'dni', 'nombre', 'domicilio', 'ano', 'mesa', 'mesa_local', 'barrio', 'referencia', 'edad', 'tipo_votante', 'id_user', 'estado', 'orden', 'ejemplar']; // Los nombre de los campos.

    public $timestamps = true;

    // Un Padron puede estar en muchos punteo
    public function padron_punteo(){
        return $this->hasMany('app/Models/PunteoModel');
    }

    // Un Padron puede estar en muchos punteo
    public function padron_comida(){
        return $this->hasMany('app/Models/ComidaModel');
    }
}
