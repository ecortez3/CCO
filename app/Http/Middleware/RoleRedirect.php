<?php namespace App\Http\Middleware;

use Closure;

class RoleRedirect {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$role = $request->input('roles');
		if ($role == 1){
			return redirect(0->action(Admin page);
		}
		elseif ($role == 2){
			return redirect()->action(case manager page);
		}
		else if($role == 3){
			return redirect()->action(reporter page);
		}
		else if($role == 4){
			return redirect()->action(meal counter page);
		}
		else{
			return response('Unauthorized.', 401);
		}
		
		return $next($request);
	}

}
