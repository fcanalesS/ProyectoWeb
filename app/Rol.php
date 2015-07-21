<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model {

	protected $table = 'roles';
    protected $hidden = ['created_at', 'updated_at'];

    public function roles_usuarios()
    {
        return $this->hasMany('App\RolUsuario', 'rol_id');
    }

}
