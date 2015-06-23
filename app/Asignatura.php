<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model {

	protected $table = 'asignaturas';
    protected $fillable = ['departamento_id', 'codigo', 'nombre', 'descripcion'];
    protected $hidden = ['created_at', 'updated_at'];

    public function asignaturas_departamentos ()
    {
        return $this->belongsTo('App\Departamento', 'departamento_id');
    }

    public function asignaturas_curso ()
    {
        return $this->hasMany('App\Curso', 'asignatura_id', 'id');
    }

}
