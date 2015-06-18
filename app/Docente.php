<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model {

    protected $table = 'docentes';
    protected $hidden = ['created_at', 'updated_at'];

    public function docente_departamento()
    {
        return $this->belongsTo('App\Departamento', 'departamento_id');
    }

    public function docente_curso()
    {
        return $this->hasMany('App\Curso', 'docente_id');
    }

}
