<?php

namespace App\Http\Middleware;

use Closure;

class RootMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
  
         if (auth()->user()->role_id == 1)
         {
             return $response;            
         }
 
        //  alert()->error('Será redirigido al menú pricipal','Usuario sin permisos para acceder a esta ruta')->autoclose(4000); 
        return redirect('/');
    }
}
