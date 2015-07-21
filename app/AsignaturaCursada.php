<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignaturaCursada extends Model {

	protected $table = 'asignaturas_cursadas';
    protected $fillable = ['curso_id', 'estudiante_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function ac_curso ()
    {
        return $this->belongsTo('App\Curso', 'curso_id');
    }

    public function ac_estudiantes ()
    {
        return $this->belongsTo('App\Estudiante', 'estudiante_id');
    }

}
