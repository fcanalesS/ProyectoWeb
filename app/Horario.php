<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model {

    public $timestamps = false;

	protected $table = 'horarios';
    protected $fillable = ['fecha', 'sala_id', 'periodo_id', 'curso_id'];

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
