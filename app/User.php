<?php

namespace sgt;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['id', 'usuario', 'password', 'condicion', 'id_rol', 'nombre', 'e_mail'];

    public $timestamps = true;

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Un usuario tiene un solo rol
    public function roles(){
        return $this->belongsTo('app/Models/RolesModels');
    }

    // Un Usuario puede estar en muchos punteo
    public function users_punteo(){
        return $this->hasMany('app/Models/PunteoModel');
    }

    // Un Usuario puede estar en muchas comidas
    public function users_comida(){
        return $this->hasMany('app/Models/ComidaModel');
    }

    // Un Usuario puede estar en muchas notas
    public function users_notas(){
        return $this->hasMany('app/Models/NotasModel');
    }

    // Un Usuario puede estar en muchos combustibles
    public function users_combustible(){
        return $this->hasMany('app/Models/CombustibleModel');
    }
}
