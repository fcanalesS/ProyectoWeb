<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model {

	protected $table = 'cursos';
    protected $hidden = ['created_at', 'updated_at'];

    public function curso_asignatura ()
    {
        return $this->belongsTo('App\Asignatura', 'asignatura_id');
    }

    public function curso_docente ()
    {
        return $this->belongsTo('App\Docente', 'docente_id');
    }

    public function curso_ac ()
    {
        return $this->hasMany('App\AsignaturaCursada', 'curso_id');
    }

    public function curso_horario ()
    {
        return $this->hasMany('App\Horario', 'curso_id');
    }

}
