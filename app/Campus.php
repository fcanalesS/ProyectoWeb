<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model {

	protected $table = 'campus';
    protected $hidden = ['created_at', 'updated_at'];

    public function campus_facultades ()
    {
        return $this->hasMany('App\Facultad', 'campus_id');
    }

    public function campus_salas ()
    {
        return $this->hasMany('App\Sala', 'campus_id');
    }

}
