<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model {

	protected $table = 'carreras';
    protected $fillable = ['escuela_id', 'codigo', 'nombre', 'descripcion'];
    protected $hidden = ['created_at', 'updated_at'];

    public function carrera_escuela ()
    {
        return $this->belongsTo('App\Escuela', 'escuela_id');
    }

    public function carrera_estudiante ()
    {
        return $this->hasMany('App\Estudiante', 'carrera_id');
    }

}
