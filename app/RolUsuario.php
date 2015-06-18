<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RolUsuario extends Model {

	protected $table = 'roles_usuarios';
    protected $hidden = ['created_at', 'updated_at'];

    public function rol()
    {
        return $this->belongsTo('App\Rol', 'rol_id');

    }
}
