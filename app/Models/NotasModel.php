<?php

namespace sgt\Models;

use Illuminate\Database\Eloquent\Model;

class NotasModel extends Model
{
    protected $table = 'notas';
    //protected $primaryKey = 'ciden'; // Se usa si el campo identidad no se llama id
    protected $fillable = ['id', 'id_user', 'fecha', 'nota', 'tipo', 'visible', 'activo']; // Los nombre de los campos


    // Una Nota tiene un solo Usuario
    public function notas_users(){
        return $this->belongsTo('app/User');
    }
}
