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
		return $next($request);
	}

}
