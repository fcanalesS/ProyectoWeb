<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model {

	protected $table = 'funcionarios';
    protected $hidden = ['created_at', 'updated_at'];

    public function funcionario_departamento ()
    {
        return $this->belongsTo('App\Departamento', 'departamento_id');
    }

}
