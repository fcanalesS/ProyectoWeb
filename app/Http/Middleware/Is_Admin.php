<?php namespace App\Http\Middleware;

use App\RolUsuario;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class Is_Admin {
    /**
     * @var Guard
     */
    private $auth;

    /**
     * Handle an incoming request.
     *
     * @param Guard $auth
     * @internal param \Illuminate\Http\Request $request
     * @internal param Closure $next
     */

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
        $admin = false;

        foreach ($rol as $r)
        {
            if ($r->nombre == 'ADMINISTRADOR')
            {
                $admin = true;
            }
        }

        if ($admin == false)
        {
            $this->auth->logout();

            return redirect()->to('/login')->with('no', 'No está autorizado para ver este contenido');
        }

        return $next($request);
	}

}
