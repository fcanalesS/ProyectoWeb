<?php namespace App\Http\Middleware;

use App\RolUsuario;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class IsEstudiante {

	/**
	 * @var Guard
	 */
	private $guard;

	public function __construct(Guard $guard)
	{
		$this->guard = $guard;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$rut = $this->guard->user()->rut;

		$rol = $rol = RolUsuario::join('roles','roles_usuarios.rol_id','=','roles.id')
			->where('roles_usuarios.rut','=',$rut)
			->select('roles.nombre')
			->get();

		$estu = false;

		foreach ($rol as $r)
		{
			if ($r->nombre == 'ESTUDIANTE')
			{
				$estu = true;
			}
		}

		if ($estu == false)
		{
			$this->guard->logout();

			return redirect()->to('/login')->with('no', 'No está autorizado para ver este contenido');
		}


		return $next($request);
	}

}
