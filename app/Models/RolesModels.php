<?php

namespace sgt\Models;

use Illuminate\Database\Eloquent\Model;

class RolesModels extends Model
{
    protected $table = 'roles';
    //protected $primaryKey = 'ciden'; // Se usa si el campo identidad no se llama id
    protected $fillable = ['id', 'nombre', 'descripcion', 'condicion']; // Los nombre de los campos

    public $timestamps = false;

    // Un rol puede tener varios usuarios
    public function users(){
    	return $this->hasMany('app/User');
    }
}
