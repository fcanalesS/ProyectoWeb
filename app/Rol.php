<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model {

	protected $table = 'roles';

    public function roles_usuarios()
    {
        return $this->hasOne('App\RolUsuario');
    }

}
