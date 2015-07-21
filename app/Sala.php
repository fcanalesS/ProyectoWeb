<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model {

	protected $table = 'salas';
    protected $fillable = ['campus_id', 'tipo_sala_id', 'nombre', 'descripcion'];
    protected $hidden = ['created_at', 'updated_at'];

    public function sala_campus ()
    {
        return $this->belongsTo('App\Campus', 'campus_id');
    }

    public function sala_tipoS ()
    {
        return $this->belongsTo('App\TipoSala', 'tipo_sala_id');
    }

    public function sala_horarios ()
    {
        return $this->hasOne('App\Horario', 'sala_id');
    }

}
