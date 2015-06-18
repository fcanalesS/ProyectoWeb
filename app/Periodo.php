<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model {

	protected $table = 'periodos';
    protected $hidden = ['created_at', 'updated_at'];

    public function periodo_horario ()
    {
        return $this->hasMany('App\Horario', 'periodo_id');
    }
}
