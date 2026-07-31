<?php

namespace sgt\Models;

use Illuminate\Database\Eloquent\Model;

class ConteoModel extends Model
{
    protected $table = 'conteo';

    //protected $primaryKey = 'ciden'; // Se usa si el campo identidad no se llama id
    protected $fillable = ['id', 'numero_mesa', 'descripcion', 'conteo', 'id_user', 'conteo_seguro']; // Los nombre de los campos.

    public $timestamps = true;
}
