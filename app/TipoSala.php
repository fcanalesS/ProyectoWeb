<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSala extends Model {

	protected $table = 'tipos_salas';
    protected $hidden = ['created_at', 'updated_at'];

    public function tipoS_salas ()
    {
        return $this->hasMany('App\Sala', 'tipo_sala_id');
    }

}
