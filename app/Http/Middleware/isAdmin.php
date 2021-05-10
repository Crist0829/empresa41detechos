<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if(Auth::user()->rol == 'propietario' || Auth::user()->rol == 'empleado'){

            return $next($request);

        }else{

            return redirect('dashboard');

        }


        
    }
}
