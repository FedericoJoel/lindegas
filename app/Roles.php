<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fillable = [
        'nombre', 'permisos'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'roles_users', 'id_rol', 'id_user');
    }
}
