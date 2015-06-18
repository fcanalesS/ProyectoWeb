<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model {

	protected $table = 'escuela';
    protected $hidden = ['created_at', 'updated_at'];

    public function escuela_departamento()
    {
        return $this->belongsTo('App\Departamento', 'departamento_id');
    }

    public function escuela_carrera()
    {
        return $this->hasMany('App\Carrera', 'escuela_id');
    }

}
