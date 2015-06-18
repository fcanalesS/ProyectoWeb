<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model {

	protected $table = 'facultades';
    protected $hidden = ['created_at', 'updated_at'];

    public function campus()
    {
        return $this->belongsTo('App\Campus', 'campus_id');
    }

    public function fac_departamentos ()
    {
        return $this->hasMany('App\Departamento', 'facultad_id');
    }

}
