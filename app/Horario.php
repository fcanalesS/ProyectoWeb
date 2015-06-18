<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model {

	protected $table = 'horarios';
    protected $hidden = ['created_at', 'updated_at'];

    public function horario_sala ()
    {
        return $this->belongsTo('App\Sala', 'sala_id');
    }

    public function horario_periodo ()
    {
        return $this->belongsTo('App\Periodo', 'periodo_id');
    }

    public function horario_curso ()
    {
        return $this->belongsTo('App\Curso', 'curso_id');
    }

}
