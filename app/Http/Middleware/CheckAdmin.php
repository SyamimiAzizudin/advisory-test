<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;

use Auth;
use Closure;

class CheckAdmin
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
       if( Auth::check() && Auth::user()->type == 'administrator' ) {
            return $next($request);
        }
        
        return back()->withErrors('You dont have permission!');
    }
    
}
