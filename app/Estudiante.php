<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model {

	protected $table = 'estudiantes';
    protected $fillable = ['carrera_id', 'rut', 'nombres', 'apellidos', 'email'];
    protected $hidden = ['created_at', 'updated_at'];

    public function estudiante_carrera ()
    {
        return $this->belongsTo('App\Carrera', 'carrera_id');
    }

    public function estudiante_ac ()
    {
        return $this->hasMany('App\AsignaturaCursada', 'estudiante_id');
    }

}
