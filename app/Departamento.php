<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model {

	protected $table = 'departamentos';
    protected $fillable = ['nombre', 'facultad_id', 'descripcion'];
    protected $hidden = ['created_at', 'updated_at'];

    public function dep_facultades ()
    {
        return $this->belongsTo('App\Facultad', 'facultad_id');
    }

    public function departamento_escuela ()
    {
        return $this->hasMany('App\Escuela', 'departamento_id');
    }

    public function departamentos_carreras ()
    {
        return $this->hasMany('App\Carrera', 'departamento_id');
    }

    public function departamentos_funcionarios ()
    {
        return $this->hasMany('App\Funcionario', 'departamento_id');
    }

    public function departamento_docentes ()
    {
        return $this->hasMany('App\Docente', 'departamento_id');
    }

    public function departamento_asignatura ()
    {
        return $this->hasMany('App\Asignatura', 'departamento_id');
    }


}
