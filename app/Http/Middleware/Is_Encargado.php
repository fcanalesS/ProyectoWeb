<?php namespace App\Http\Middleware;

use App\RolUsuario;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class Is_Encargado {

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}
	public function handle($request, Closure $next)
	{
		$rut = $this->auth->user()->rut;

		$rol = RolUsuario::join('roles','roles_usuarios.rol_id','=','roles.id')
			->where('roles_usuarios.rut','=',$rut)
			->select('roles.nombre')
			->get();
		$encargado = false;

		foreach ($rol as $r)
		{
			if ($r->nombre == 'ENCARGADO_CAMPUS')
			{
				$encargado = true;
			}
		}

		if ($encargado == false)
		{
			$this->auth->logout();

			return redirect()->to('/login');
		}

		return $next($request);
	}

}
